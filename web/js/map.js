var labels = [];
var displayLabel = false;
var displayMap = false;
var selectPoint = false;
var selectSingleClick = new ol.interaction.Select();
var source = new ol.source.OSM();
var laltitudeId = "";
var altitudeId = "";
var longitudeId = "";
let draw = null;
// const typeSelect = document.getElementById('type');
// typeSelect.value = "";
document.getElementById("taaf-hide-label").style.display = "none";
var serverIp = document.getElementById("serverIp").innerText;

setTimeout(function(){
  var inputs = document.getElementsByTagName("input");
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].id.indexOf("latitude") != -1){
      laltitudeId = inputs[i].id;
    }
    if (inputs[i].id.indexOf("altitude") != -1){
      altitudeId = inputs[i].id;
    }
    if (inputs[i].id.indexOf("longitude") != -1){
      longitudeId = inputs[i].id;
    }
  }
}, 100);

var defaultStyle = {
  'Point': new ol.style.Style({
    image: new ol.style.Circle({
      fill: new ol.style.Fill({
        color: 'rgba(0,60,136,.5)'
      }),
      radius: 5,
      stroke: new ol.style.Stroke({
        color: 'rgba(0,60,136,.5)',
        width: 1
      })
    })
  })
};

var dragAndDropInteraction = new ol.interaction.DragAndDrop({
  formatConstructors: [
    ol.format.GPX,
    ol.format.GeoJSON,
    ol.format.IGC,
    ol.format.KML,
    ol.format.TopoJSON
  ]
});

var raster = new ol.layer.Tile({
  // source: new ol.source.XYZ({
  //   url: 'http://' + serverIp + ':8000/asset/Amsterdam/{z}/{x}/{y}.png'
  // })
  source: new ol.source.OSM()
});

var source = new ol.source.Vector({wrapX: false});

var vector = new ol.layer.Vector({
  source: source
});
// var GPXfeatures = (new ol.format.GPX()).readFeatures(localStorage.getItem("gpx"), {featureProjection: 'EPSG:3857'})
// vector.getSource().addFeatures(GPXfeatures)

var map = new ol.Map({
  interactions: ol.interaction.defaults().extend([dragAndDropInteraction]),
  layers: [raster, vector],
  target: 'map',
  view: new ol.View({
    center: ol.proj.transform([77.5578658823407, -37.836996810851645], 'EPSG:4326', 'EPSG:3857'),
    zoom: 11
  })
});

document.getElementById("taaf-hide-label").onclick = manageLabel;
document.getElementById("taaf-hide-map").onclick = manageMap;
document.getElementById("taaf-select-manually").onclick = manageSelectPoint;

dragAndDropInteraction.on('addfeatures', function(e) {
  var seen = [];

  document.getElementById("taaf-hide-label").style.display = "block";

  var json = JSON.stringify(e.features, function(key, val) {
     if (val != null && typeof val == "object") {
          if (seen.indexOf(val) >= 0) {
              return;
          }
          seen.push(val);
      }
      return val;
  });
  var GPX = (new ol.format.GPX()).writeFeatures(e.features, {featureProjection: 'EPSG:3857'});
  localStorage.setItem("gpx", GPX);
  for (var i = 0; i < e.features.length; i++) {
    var lon = e.features[i].getGeometry().clone().transform('EPSG:3857','EPSG:4326').A[0];
    var lat = e.features[i].getGeometry().clone().transform('EPSG:3857','EPSG:4326').A[1];
    var pos = ol.proj.fromLonLat([lon, lat]);
    var name =  e.features[i].N.name;
    var node = document.createElement("div");

    node.setAttribute("id", name);
    node.appendChild(document.createTextNode(name));
    document.getElementById("label").appendChild(node);
    labels.push(new ol.Overlay({
      position: pos,
      element: document.getElementById(name)
    }));
    map.addOverlay(labels[labels.length - 1]);
  }
  var vectorSource = new ol.source.Vector({
    features: e.features,
    format: new ol.format.GeoJSON()
  });
  map.addLayer(new ol.layer.Vector({
   source: vectorSource,
   style: defaultStyle["Point"]
  }));
  map.getView().fit(vectorSource.getExtent());
});

map.on('click', function(evt) {
  // document.getElementById("taaf-name-content").innerHTML = "";
  map.addInteraction(selectSingleClick);
   selectSingleClick.on('select', function(e) {
     console.log(e);
     document.getElementById(longitudeId).value = e.selected[0].getGeometry().clone().transform('EPSG:3857','EPSG:4326').A[0];
     document.getElementById(laltitudeId).value = e.selected[0].getGeometry().clone().transform('EPSG:3857','EPSG:4326').A[1];
     if (!draw) {
       document.getElementById(altitudeId).value = e.selected[0].getGeometry().clone().transform('EPSG:3857','EPSG:4326').A[2];
     }
   });
});

function manageLabel() {
  displayLabel = !displayLabel;
  var text = displayLabel ? "Afficher les labels" : "Cacher les labels";
  var mode = displayLabel ? "none" : "block";

  for (var i = 0; i < labels.length; i++) {
    document.getElementById(labels[i].N.element.id).style.display = mode;
  }
  document.getElementById("taaf-hide-label").innerHTML = text;
}

function manageMap() {
  displayMap = !displayMap;
  var text = displayMap ? "Afficher un fond de carte" : "Cacher le fond de carte";
  var mode = displayMap ? "none" : "block";

  document.getElementById("taaf-map").style.display = mode;
  document.getElementById("taaf-hide-map").innerHTML = text;
}

function manageSelectPoint() {
  var text = selectPoint ? "Placer un point sur la carte" : "Ne plus placer de point sur la carte";
  selectPoint = !selectPoint;

  if (selectPoint) {
    draw = new ol.interaction.Draw({
      source: source,
      type: "Point"
    });
    map.addInteraction(draw);
  } else {
    map.removeInteraction(draw);
    draw = null;
  }
  document.getElementById("taaf-select-manually").innerHTML = text;
}

// function addInteraction() {
//   // const value = typeSelect.value;
//   console.log("value", value);
//   switch (value) {
//     case 'Kerguelen':
//       map.getView().setCenter(ol.proj.transform([69.40429420152225, -49.346657058295264], 'EPSG:4326', 'EPSG:3857'));
//       map.getView().setZoom(7.5);
//       break;
//     case 'Crozet':
//       map.getView().setCenter(ol.proj.transform([51.05254935475395, -46.29767281278939], 'EPSG:4326', 'EPSG:3857'));
//       map.getView().setZoom(8);
//       break;
//     case 'Amsterdam':
//       map.getView().setCenter(ol.proj.transform([77.5578658823407, -37.836996810851645], 'EPSG:4326', 'EPSG:3857'));
//       map.getView().setZoom(12);
//       break;
//     default:
//       console.log('Error ');
//   }
// }

// typeSelect.onchange = function() {
//   addInteraction();
// };
