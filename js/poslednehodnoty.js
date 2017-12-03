
function drawOutsideChart() {

  var OutsideData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Von', temperatureOutsideJs]
  ]);

  var OutsideOptions = {
    width: 200, height: 200,
    min: -40,
     greenFrom: -40, greenTo: 5.99,
        yellowFrom: 6, yellowTo: 25.99,
        redFrom: 26, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-40','-30','-20','-10','0', '10', '20', '30', '40'],max: 40
  };

  var OutsideChart = new 		google.visualization.Gauge(document.getElementById('Outside_chart_div'));

  OutsideChart.draw(OutsideData, OutsideOptions);
}

function drawLivingRoomChart() {

  var LivingRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Obývačka', temperatureLivingRoomJs]
  ]);

  var LivingRoomOptions = {
    width: 200, height: 200,
    min: 15,
     
     greenFrom: 15, greenTo: 18.99,
        yellowFrom: 19, yellowTo: 22.50,
        redFrom: 22.51, redTo: 30,
      minorTicks: 10,
    majorTicks: ['15','20','25','30'],max: 30
  };

  var LivingRoomChart = new 		google.visualization.Gauge(document.getElementById('LivingRoom_chart_div'));

  LivingRoomChart.draw(LivingRoomData, LivingRoomOptions);
}

function drawBedRoomChart() {

  var BedRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Vlhkosť', temperatureBedRoomJs]
  ]);

  var BedRoomOptions = {
    width: 200, height: 200,
    min: 0,
     greenFrom: 0, greenTo: 34,
        yellowFrom: 34.01, yellowTo: 75,
        redFrom: 75.01, redTo: 100,
      minorTicks: 20,
    majorTicks: ['0', '10', '20', '30','40', '50', '60', '70','80', '90', '100'],max: 100
  };

  var BedRoomChart = new 		google.visualization.Gauge(document.getElementById('BedRoom_chart_div'));

  BedRoomChart.draw(BedRoomData, BedRoomOptions);
}
function drawBaroChart() {

  var BaroData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Tlak', pressureOutsideJs]
  ]);

  var BaroOptions = {
    width: 200, height: 200,
    min: 960,
     greenFrom: 960, greenTo: 1010.99,
        yellowFrom: 1011, yellowTo: 1014.99,
        redFrom: 1015, redTo: 1040,
      minorTicks: 20,
    majorTicks: ['960','980', '1000','1020','1040'],max: 1040
  };

  var BaroChart = new 		google.visualization.Gauge(document.getElementById('Baro_chart_div'));

  BaroChart.draw(BaroData, BaroOptions);
}
google.setOnLoadCallback(drawOutsideChart);
google.setOnLoadCallback(drawLivingRoomChart);
google.setOnLoadCallback(drawBedRoomChart);
google.setOnLoadCallback(drawBaroChart);
