var volumePerDate = JSON.parse(document.getElementById("volumePerDate").innerHTML);
var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };

volumePerDate = volumePerDate.sort(function(a,b){
  return new Date(a.date_manip) - new Date(b.date_manip);
});

drawVolumeDate = function(){
  date = volumePerDate.map(item => {
    var event = new Date(item.date_manip);
    return event.toLocaleDateString('fr', options);
  });
  surface = volumePerDate.map(item => {
    return (item.surface_reel);
  });
  document.getElementById("graphVolumeDateContent").innerHTML = '&nbsp;';
  $('#graphVolumeDateContent').append('<canvas id="graphVolumeDate" style="height: 40%"></canvas>');
  var line = new Chart($("#graphVolumeDate").get(0).getContext("2d"), {
    type: 'line',
    data: {
      labels: date,
      datasets: [{
        label: 'Surface',
        data: surface,
        backgroundColor: 'rgba(54, 162, 235,0.2)',
        borderColor: 'rgba(54, 162, 235,1)',
        pointBorderWidth: 1,
        fill: true,
        lineTension: 0,
        borderWidth: 3
      }]
    },
    options: {
      title: {
        display: true,
        text: 'Evolution de la surface eradiquée en fonction du temps'
      },
      legend: {
        display: false,
      },
      // legendCallback: function(chart) {
      //       text.push('<h1>KOKOKO</h1>');
      // },
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

drawVolumeDate();
