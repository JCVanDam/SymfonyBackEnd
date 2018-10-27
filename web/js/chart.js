var age = [];
var date = [];
var count = [];
var initialColor = [];
var volumePerDate = JSON.parse(document.getElementById("volumePerDate").innerHTML);
var volumeAge = JSON.parse(document.getElementById("volumeAge").innerHTML);
var coordinate = JSON.parse(document.getElementById("coordinate").innerHTML);
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
var map = null;
$('#lds-spinner').hide();
var serverIp = document.getElementById("serverIp").innerText;

/*
** QueryBuilder
*/

$('#builder-import_export').queryBuilder({
  plugins: [
    'not-group'
  ],

  filters: [{
    id: 'zone_pedo',
    label: 'Zone pédologique',
    type: 'string',
    input: 'select',
    values: {
      1: '1a',
      2: '1b',
      3: '1c',
      4: '2a',
      5: '2b',
      6: '2c',
      7: '2d',
      8: '2e',
      9: '2f',
      10: '3a',
      11: '3b',
      12: '4a',
      13: '4b',
      14: '5a',
      15: '5b',
      16: '5c',
      17: '6a',
      18: '6b',
      19: '7a',
      20: '7b',
      21: '8',
      22: '9',
      23: '10'
    }
  }, {
    id: 'distance_a_mer_reel',
    label: 'Distance à la mer',
    type: 'integer',
  }, {
    id: 'suivi_biannuelle',
    label: 'Suivi biannuelle',
    type: 'boolean',
  }, {
    id: 'date_plantation',
    label: 'Date de plantation',
    type: 'date',
    validation: {
      format: 'YYYY/MM/DD'
    },
    plugin: 'datepicker',
    plugin_config: {
      format: 'yyyy/mm/dd',
      todayBtn: 'linked',
      todayHighlight: true,
      autoclose: true
    }
  },
  ]
});

/*
** Submit button action search
*/

$('#btn-get-sql-search').on('click', function() {
  var result = $('#builder-import_export').queryBuilder('getSQL');
  if ((n = result.sql.indexOf("suivi_biannuelle")) != -1) {
    var mode = result.sql.substr(n + 19, 1) == 1 ? 'true' : 'false';
    result.sql = result.sql.substr(0, n + 19) + mode + result.sql.substr(n + 20, 2);
  }
  $.ajax({
    url:        '/admin/ajax',
    type:       'POST',
    dataType:   'json',
    async:      true,
    data: result,
    beforeSend: function(){
        $('#lds-spinner').show();
    },
    complete: function(){
        $('#lds-spinner').hide();
    },
    success: function(data, status) {
      volumeAge = data.volumeAge;
      volumePerDate = data.volumeDate;
      coordinate =  data.coordinate;
      drawVolumeAge();
      drawVolumeDate();
      drawMap();
    },
    error : function(xhr, textStatus, errorThrown) {
       console.log(xhr,textStatus, errorThrown);
    }
 });
});

/*
** Submit button action export
*/

$('#btn-get-sql-export').on('click', function() {
  var result = $('#builder-import_export').queryBuilder('getSQL');
  if ((n = result.sql.indexOf("suivi_biannuelle")) != -1) {
    var mode = result.sql.substr(n + 19, 1) == 1 ? 'true' : 'false';
    result.sql = result.sql.substr(0, n + 19) + mode + result.sql.substr(n + 20, 2);
  }
  $.ajax({
    url:        '/admin/export',
    type:       'POST',
    dataType:   'json',
    async:      true,
    data: result,
    beforeSend: function(){
        $('#lds-spinner').show();
    },
    complete: function(){
        $('#lds-spinner').hide();
    },
    success: function(data, status) {
      console.log("export ok");
    },
    error : function(xhr, textStatus, errorThrown) {
       console.log(xhr,textStatus, errorThrown);
    }
 });
});

/*
** Draw line chart
*/

drawVolumeDate = function(){
  date = volumePerDate.map(item => {
    var event = new Date(
      item.date_plantation.date ?
      item.date_plantation.date : item.date_plantation
    );
    return event.toLocaleDateString('fr', options);
  });

  count = volumePerDate.map(item => {
    return item.counter;
  });
  document.getElementById("graphVolumeDateContent").innerHTML = '&nbsp;';
  $('#graphVolumeDateContent').append('<canvas id="graphVolumeDate" style="height: 40%"></canvas>');
  var line = new Chart($("#graphVolumeDate").get(0).getContext("2d"), {
    type: 'line',
    data: {
      labels: date,
      datasets: [{
        label: 'Philica planté',
        data: count,
        backgroundColor: 'rgba(54, 162, 235,0.2)',
        borderColor: 'rgba(54, 162, 235,1)',
        pointBorderWidth: 1,
        fill: false,
        borderWidth: 3
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Nombre de Phylica par date'
      },
      legend: {
        display: false,
      },
      scales: {
        xAxes:
        [{
          display: true,
          ticks: {
            beginAtZero: false,
            min: 0
          }
        }],
        xAxes:
        [{
          display: true,
          ticks: {
            beginAtZero: false
          }
        }]
      }
    }
  });
}

/*
** Draw pie chart
*/

drawVolumeAge = function(){
  age = volumeAge.map((item, i) => {
    if (item.res == null)
      return "non renseigné"
    return item.res;
  });
  count = volumeAge.map(item => {
    return item.counter;
  });
  color = count.map(item => {
    Math.floor((Math.random() * 255) + 1);
    return 'rgba(' +
      Math.floor((Math.random() * 255) + 1) + ',' +
      Math.floor((Math.random() * 255) + 1) + ',' +
      Math.floor((Math.random() * 255) + 1) + ', 0.5)';
  })
  document.getElementById("graphVolumeAgeContent").innerHTML = '&nbsp;';
  $('#graphVolumeAgeContent').append('<canvas id="graphVolumeAge" style="height: 40%"></canvas>');
  pie = new Chart($("#graphVolumeAge").get(0).getContext("2d"), {
      type: 'pie',
      data: {
          labels: age,
          datasets: [{
              data: count,
              backgroundColor: color,
              borderColor: color,
              borderWidth: 1
          }]
      },
      options: {
        title: {
          display: true,
          text: 'Nombre de Phylica par age'
        },
      }
  });
}

/*
** Draw map
*/

drawMap = function(){
  document.getElementById("mapContainer").innerHTML = '&nbsp;';
  $('#mapContainer').append('<div id="map" class="map taaf_map_container" style="width:400px"></div>');
  map = null;

  features = coordinate.map(item => {
    var geometry = new ol.geom.Point([Number(item.longitude), Number(item.latitude)]);
    var test = geometry.clone().transform('EPSG:4326','EPSG:3857');
    var feature = new ol.Feature(test);
    return feature;
  });

  var raster = new ol.layer.Tile({
    // source: new ol.source.XYZ({
    //   url: 'http://' + serverIp + ':8000/asset/Amsterdam/{z}/{x}/{y}.png'
    // })
    source: new ol.source.OSM()
  });

  var vectorSource = new ol.source.Vector({
    features: features
  });

  var vector = new ol.layer.Vector({
    source: vectorSource
  });

  vector.getSource().addFeatures(vectorSource);
  map = new ol.Map({
    layers: [raster, vector],
    target: 'map',
    view: new ol.View({
      center: [0, 0],
      zoom: 2
    })
  });
  map.getView().setCenter(ol.proj.transform([77.5578658823407, -37.836996810851645], 'EPSG:4326', 'EPSG:3857'));
  map.getView().setZoom(11);
}

drawVolumeAge();
drawVolumeDate();
drawMap();
