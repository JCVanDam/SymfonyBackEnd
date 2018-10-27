var serverIp = document.getElementById("serverIp").innerText;

var raster = new ol.layer.Tile({
  source: new ol.source.XYZ({
    url: 'http://' + serverIp + ':8000/asset/Amsterdam/{z}/{x}/{y}.png'
  })
});

var map = new ol.Map({
  layers: [raster],
  target: 'map',
  view: new ol.View({
    center: ol.proj.transform([77.5578658823407, -37.836996810851645], 'EPSG:4326', 'EPSG:3857'),
    zoom: 11
  })
});
