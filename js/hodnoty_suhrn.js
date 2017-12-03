      function drawHighestOutsideTodayChart() {

  var HighestOutsideTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Von', highesttemperatureOutsideTodayJs]
  ]);

  var HighestOutsideTodayOptions = {
     width: 200, height: 200,
    min: -40,
     greenFrom: -40, greenTo: 5.99,
        yellowFrom: 6, yellowTo: 25.99,
        redFrom: 26, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-40','-30','-20','-10','0', '10', '20', '30', '40'],max: 40
  };

  var HighestOutsideTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestOutsideToday_chart_div'));

  HighestOutsideTodayChart.draw(HighestOutsideTodayData, HighestOutsideTodayOptions);
}

function drawHighestLivingRoomTodayChart() {

  var HighestLivingRoomTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Obývačka', highesttemperatureLivingRoomTodayJs]
  ]);

  var HighestLivingRoomTodayOptions = {
    width: 200, height: 200,
    min: 15,
     
     greenFrom: 15, greenTo: 18.99,
        yellowFrom: 19, yellowTo: 22.50,
        redFrom: 22.51, redTo: 30,
      minorTicks: 10,
    majorTicks: ['15','20','25','30'],max: 30
  };

  var HighestLivingRoomTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestLivingRoomToday_chart_div'));

  HighestLivingRoomTodayChart.draw(HighestLivingRoomTodayData, HighestLivingRoomTodayOptions);
}

function drawHighestBedRoomTodayChart() {

  var HighestBedRoomTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Vlhkosť', highesttemperatureBedRoomTodayJs]
  ]);

  var HighestBedRoomTodayOptions = {
    width: 200, height: 200,
    min: 0,
     greenFrom: 0, greenTo: 34,
        yellowFrom: 34.01, yellowTo: 75,
        redFrom: 75.01, redTo: 100,
      minorTicks: 10,
    majorTicks: ['0', '10', '20', '30','40', '50', '60', '70','80', '90', '100'],max: 100
  };

  var HighestBedRoomTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestBedRoomToday_chart_div'));

  HighestBedRoomTodayChart.draw(HighestBedRoomTodayData, HighestBedRoomTodayOptions);
}
function drawHighestBaroTodayChart() {

  var HighestBaroTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Tlak', highestpressureOutsideTodayJs]
  ]);

  var HighestBaroTodayOptions = {
      width: 200, height: 200,
    min: 960,
     greenFrom: 960, greenTo: 1010.99,
        yellowFrom: 1011, yellowTo: 1014.99,
        redFrom: 1015, redTo: 1040,
      minorTicks: 20,
    majorTicks: ['960','980', '1000','1020','1040'],max: 1040
  };

  var HighestBaroTodayChart = new 		google.visualization.Gauge(document.getElementById('HighestBaroToday_chart_div'));

  HighestBaroTodayChart.draw(HighestBaroTodayData, HighestBaroTodayOptions);
}

      function drawLowestOutsideTodayChart() {

  var LowestOutsideTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Von', lowesttemperatureOutsideTodayJs]
  ]);

  var LowestOutsideTodayOptions = {
    width: 200, height: 200,
    min: -40,
     greenFrom: -40, greenTo: 5.99,
        yellowFrom: 6, yellowTo: 25.99,
        redFrom: 26, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-40','-30','-20','-10','0', '10', '20', '30', '40'],max: 40
  };

  var LowestOutsideTodayChart = new 		google.visualization.Gauge(document.getElementById('LowestOutsideToday_chart_div'));

  LowestOutsideTodayChart.draw(LowestOutsideTodayData, LowestOutsideTodayOptions);
}

function drawLowestLivingRoomTodayChart() {

  var LowestLivingRoomTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Obývačka', lowesttemperatureLivingRoomTodayJs]
  ]);

  var LowestLivingRoomTodayOptions = {
    width: 200, height: 200,
    min: 15,
     
     greenFrom: 15, greenTo: 18.99,
        yellowFrom: 19, yellowTo: 22.50,
        redFrom: 22.51, redTo: 30,
      minorTicks: 10,
    majorTicks: ['15','20','25','30'],max: 30
  };

  var LowestLivingRoomTodayChart = new 		google.visualization.Gauge(document.getElementById('LowestLivingRoomToday_chart_div'));

  LowestLivingRoomTodayChart.draw(LowestLivingRoomTodayData, LowestLivingRoomTodayOptions);
}

function drawLowestBedRoomTodayChart() {

  var LowestBedRoomTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Vlhkosť', lowesttemperatureBedRoomTodayJs]
  ]);

  var LowestBedRoomTodayOptions = {
  width: 200, height: 200,
    min: 0,
     greenFrom: 0, greenTo: 34,
        yellowFrom: 34.01, yellowTo: 75,
        redFrom: 75.01, redTo: 100,
      minorTicks: 10,
    majorTicks: ['0', '10', '20', '30','40', '50', '60', '70','80', '90', '100'],max: 100
  };

  var LowestBedRoomTodayChart = new 		google.visualization.Gauge(document.getElementById('LowestBedRoomToday_chart_div'));

  LowestBedRoomTodayChart.draw(LowestBedRoomTodayData, LowestBedRoomTodayOptions);
}
function drawLowestBaroTodayChart() {

  var LowestBaroTodayData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Tlak', lowestpressureOutsideTodayJs]
  ]);

  var LowestBaroTodayOptions = {
     width: 200, height: 200,
    min: 960,
     greenFrom: 960, greenTo: 1010.99,
        yellowFrom: 1011, yellowTo: 1014.99,
        redFrom: 1015, redTo: 1040,
      minorTicks: 20,
    majorTicks: ['960','980', '1000','1020','1040'],max: 1040
  };

  var LowestBaroTodayChart = new 		google.visualization.Gauge(document.getElementById('LowestBaroToday_chart_div'));

  LowestBaroTodayChart.draw(LowestBaroTodayData, LowestBaroTodayOptions);
}

function drawAvgOutsideChart() {

  var AvgOutsideData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Von', avgtemperatureOutsideJs]
  ]);

  var AvgOutsideOptions = {
  width: 200, height: 200,
    min: -40,
     greenFrom: -40, greenTo: 5.99,
        yellowFrom: 6, yellowTo: 25.99,
        redFrom: 26, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-40','-30','-20','-10','0', '10', '20', '30', '40'],max: 40
    
  };

  var AvgOutsideChart = new 		google.visualization.Gauge(document.getElementById('AvgOutside_chart_div'));

  AvgOutsideChart.draw(AvgOutsideData, AvgOutsideOptions);
}

function drawAvgLivingRoomChart() {

  var AvgLivingRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Obývačka', avgtemperatureLivingRoomJs]
  ]);

  var AvgLivingRoomOptions = {
  width: 200, height: 200,
    min: 15,
     
     greenFrom: 15, greenTo: 18.99,
        yellowFrom: 19, yellowTo: 22.50,
        redFrom: 22.51, redTo: 30,
      minorTicks: 10,
    majorTicks: ['15','20','25','30'],max: 30
  };

  var AvgLivingRoomChart = new 		google.visualization.Gauge(document.getElementById('AvgLivingRoom_chart_div'));

  AvgLivingRoomChart.draw(AvgLivingRoomData, AvgLivingRoomOptions);
}

function drawAvgBedRoomChart() {

  var AvgBedRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Vlhkosť', avgtemperatureBedRoomJs]
  ]);

  var AvgBedRoomOptions = {
   width: 200, height: 200,
    min: 0,
     greenFrom: 0, greenTo: 34,
        yellowFrom: 34.01, yellowTo: 75,
        redFrom: 75.01, redTo: 100,
       minorTicks: 10,
    majorTicks: ['0', '10', '20', '30','40', '50', '60', '70','80', '90', '100'],max: 100
  };

  var AvgBedRoomChart = new 		google.visualization.Gauge(document.getElementById('AvgBedRoom_chart_div'));

  AvgBedRoomChart.draw(AvgBedRoomData, AvgBedRoomOptions);
}
function drawAvgBaroChart() {

  var AvgBaroData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Tlak', avgpressureOutsideJs]
  ]);

  var AvgBaroOptions = {
    width: 200, height: 200,
    min: 960,
     greenFrom: 960, greenTo: 1010.99,
        yellowFrom: 1011, yellowTo: 1014.99,
        redFrom: 1015, redTo: 1040,
      minorTicks: 20,
    majorTicks: ['960','980', '1000','1020','1040'],max: 1040
  };

  var AvgBaroChart = new 		google.visualization.Gauge(document.getElementById('AvgBaro_chart_div'));

  AvgBaroChart.draw(AvgBaroData, AvgBaroOptions);
}

      function drawHighestOutsideChart() {

  var HighestOutsideData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Von', highesttemperatureOutsideJs]
  ]);

  var HighestOutsideOptions = {
   width: 200, height: 200,
    min: -40,
     greenFrom: -40, greenTo: 5.99,
        yellowFrom: 6, yellowTo: 25.99,
        redFrom: 26, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-40','-30','-20','-10','0', '10', '20', '30', '40'],max: 40
  };

  var HighestOutsideChart = new 		google.visualization.Gauge(document.getElementById('HighestOutside_chart_div'));

  HighestOutsideChart.draw(HighestOutsideData, HighestOutsideOptions);
}

function drawHighestLivingRoomChart() {

  var HighestLivingRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Obývačka', highesttemperatureLivingRoomJs]
  ]);

  var HighestLivingRoomOptions = {
     width: 200, height: 200,
    min: 15,
     
     greenFrom: 15, greenTo: 18.99,
        yellowFrom: 19, yellowTo: 22.50,
        redFrom: 22.51, redTo: 30,
      minorTicks: 10,
    majorTicks: ['15','20','25','30'],max: 30
  };

  var HighestLivingRoomChart = new 		google.visualization.Gauge(document.getElementById('HighestLivingRoom_chart_div'));

  HighestLivingRoomChart.draw(HighestLivingRoomData, HighestLivingRoomOptions);
}

function drawHighestBedRoomChart() {

  var HighestBedRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Vlhkosť', highesttemperatureBedRoomJs]
  ]);

  var HighestBedRoomOptions = {
  width: 200, height: 200,
    min: 0,
     greenFrom: 0, greenTo: 34,
        yellowFrom: 34.01, yellowTo: 75,
        redFrom: 75.01, redTo: 100,
       minorTicks: 10,
    majorTicks: ['0', '10', '20', '30','40', '50', '60', '70','80', '90', '100'],max: 100
  };

  var HighestBedRoomChart = new 		google.visualization.Gauge(document.getElementById('HighestBedRoom_chart_div'));

  HighestBedRoomChart.draw(HighestBedRoomData, HighestBedRoomOptions);
}
function drawHighestBaroChart() {

  var HighestBaroData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Tlak', highestpressureOutsideJs]
  ]);

  var HighestBaroOptions = {
    width: 200, height: 200,
    min: 960,
     greenFrom: 960, greenTo: 1010.99,
        yellowFrom: 1011, yellowTo: 1014.99,
        redFrom: 1015, redTo: 1040,
      minorTicks: 20,
    majorTicks: ['960','980', '1000','1020','1040'],max: 1040
  };

  var HighestBaroChart = new 		google.visualization.Gauge(document.getElementById('HighestBaro_chart_div'));

  HighestBaroChart.draw(HighestBaroData, HighestBaroOptions);
}
      function drawLowestOutsideChart() {

  var LowestOutsideData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Von', lowesttemperatureOutsideJs]
  ]);

  var LowestOutsideOptions = {
   width: 200, height: 200,
    min: -40,
     greenFrom: -40, greenTo: 5.99,
        yellowFrom: 6, yellowTo: 25.99,
        redFrom: 26, redTo: 40,
      minorTicks: 10,
    majorTicks: ['-40','-30','-20','-10','0', '10', '20', '30', '40'],max: 40
  };

  var LowestOutsideChart = new 		google.visualization.Gauge(document.getElementById('LowestOutside_chart_div'));

  LowestOutsideChart.draw(LowestOutsideData, LowestOutsideOptions);
}

function drawLowestLivingRoomChart() {

  var LowestLivingRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Obývačka', lowesttemperatureLivingRoomJs]
  ]);

  var LowestLivingRoomOptions = {
    width: 200, height: 200,
    min: 15,
     
     greenFrom: 15, greenTo: 18.99,
        yellowFrom: 19, yellowTo: 22.50,
        redFrom: 22.51, redTo: 30,
      minorTicks: 10,
    majorTicks: ['15','20','25','30'],max: 30
  };

  var LowestLivingRoomChart = new 		google.visualization.Gauge(document.getElementById('LowestLivingRoom_chart_div'));

  LowestLivingRoomChart.draw(LowestLivingRoomData, LowestLivingRoomOptions);
}

function drawLowestBedRoomChart() {

  var LowestBedRoomData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Vlhkosť', lowesttemperatureBedRoomJs]
  ]);

  var LowestBedRoomOptions = {
  width: 200, height: 200,
    min: 0,
     greenFrom: 0, greenTo: 34,
        yellowFrom: 34.01, yellowTo: 75,
        redFrom: 75.01, redTo: 100,
       minorTicks: 10,
    majorTicks: ['0', '10', '20', '30','40', '50', '60', '70','80', '90', '100'],max: 100
  };

  var LowestBedRoomChart = new 		google.visualization.Gauge(document.getElementById('LowestBedRoom_chart_div'));

  LowestBedRoomChart.draw(LowestBedRoomData, LowestBedRoomOptions);
}
function drawLowestBaroChart() {

  var LowestBaroData = google.visualization.arrayToDataTable([
    ['Label', 'Value'],
    ['Tlak', lowestpressureOutsideJs]
  ]);

  var LowestBaroOptions = {
    width: 200, height: 200,
    min: 960,
     greenFrom: 960, greenTo: 1010.99,
        yellowFrom: 1011, yellowTo: 1014.99,
        redFrom: 1015, redTo: 1040,
      minorTicks: 20,
    majorTicks: ['960','980', '1000','1020','1040'],max: 1040
  };

  var LowestBaroChart = new 		google.visualization.Gauge(document.getElementById('LowestBaro_chart_div'));

  LowestBaroChart.draw(LowestBaroData, LowestBaroOptions);
}    
google.setOnLoadCallback(drawHighestOutsideTodayChart);  
google.setOnLoadCallback(drawHighestLivingRoomTodayChart);
google.setOnLoadCallback(drawHighestBedRoomTodayChart);
google.setOnLoadCallback(drawHighestBaroTodayChart);
google.setOnLoadCallback(drawLowestOutsideTodayChart);  
google.setOnLoadCallback(drawLowestLivingRoomTodayChart);
google.setOnLoadCallback(drawLowestBedRoomTodayChart);
google.setOnLoadCallback(drawLowestBaroTodayChart);                                               
google.setOnLoadCallback(drawAvgOutsideChart);
google.setOnLoadCallback(drawAvgLivingRoomChart);
google.setOnLoadCallback(drawAvgBedRoomChart);
google.setOnLoadCallback(drawAvgBaroChart);
google.setOnLoadCallback(drawHighestOutsideChart);
google.setOnLoadCallback(drawHighestLivingRoomChart);
google.setOnLoadCallback(drawHighestBedRoomChart);
google.setOnLoadCallback(drawHighestBaroChart);
google.setOnLoadCallback(drawLowestOutsideChart);
google.setOnLoadCallback(drawLowestLivingRoomChart);
google.setOnLoadCallback(drawLowestBedRoomChart);
google.setOnLoadCallback(drawLowestBaroChart);
