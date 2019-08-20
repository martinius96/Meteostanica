
<!--Autor: Martin Chlebovec alias: martinius96-->
<!--Podpora: https://www.paypal.me/Chlebovec-->
<!--Osobný web: https://arduino.php5.sk-->
<!--Email kontakt: martinius96@gmail.com-->
<!--Facebook kontakt: 100001242570317-->
<!--Používajte v súhade s licenciou!-->
<!DOCTYPE html>
<html>
    
<head>
<title>Amatérska meteostanica - Powered by Arduino</title>
<meta name="google-site-verification" content="99geZzMQuCEbWS3wtRt2Ih_ZkECtd4vqbYD2U0K-oOU" />
<meta name="keywords" content="amatérska meteorologická stanica, stanica, meteorológia, meteo stanica, meteorologická stanica, počasie, predpoveď, prognóza, teplota, priemerná teplota, najvyššia teplota,
najnižšia teplota, °C, stupne, tlak, hPa, atmosferický tlak, atmosféra, prognóza počasia, amatér, meteorológ, pocasie poprad, šuňava, bmp280, ds18b20, čidlá, senzory, meranie teploty, meranie tlaku vzduchu, tlak vzduchu, arduino, mikroprocesor">
<meta name="robots" content="index, follow">
<meta name='revisit-after' content='2 days'>
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" type="image/x-icon" href="img/meteostation.ico">
<link rel="sitemap" type="application/xml" title="Mapa stránky" href="sitemap.xml">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

</head>
<?php include("connect.php");
//STVRTY GRAF                                                           
$result4 = mysqli_query($con,"SELECT temperature, time FROM TempOutside WHERE time >= DATE_SUB(NOW(),INTERVAL 24 HOUR)") or die(mysqli_error($con));
$rows4 = array();
$table4 = array();
$table4['cols'] = array(
    array('label' => 'time', 'type' => 'string'),
    array('label' => 'Teplota von', 'type' => 'number')
	);
    foreach($result4 as $r4) {
$cas4 = strtotime($r4['time']);
	$cas4 = date('H:i',$cas4);
        $temp4 = array();
        // The following line will be used to slice the Pie chart
        $temp4[] = array('v' => (string) $cas4);
        $temp4[] = array('v' => (float) $r4['temperature']);
       // $temp[] = array('v' => (float) $r['teplota2']);
        $rows4[] = array('c' => $temp4);
        }
$table4['rows'] = $rows4;
$jsonTable4 = json_encode($table4);

  ?>

<body>
<ul class="topnav">
  <li><a href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a  href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a class="active" href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
 </ul>                                          
     	<script type="text/javascript">
    google.load('visualization', '1', {'packages':['corechart']});
    google.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = new google.visualization.DataTable(<?=$jsonTable4?>);
      var options = {
          title: 'Posledných 24 hodín',
		  colors: ['brown'],
		  pointSize: 1
        };
      var chart = new google.visualization.LineChart(document.getElementById('chart_div4'));
      chart.draw(data, options);

    }
    </script>

<div id="chart_div4" style="display: block; max-width: 100%; height: auto;"></div>

</body>    
</html>


