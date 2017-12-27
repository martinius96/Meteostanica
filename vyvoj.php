
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
</head>
<?php include("connect.php"); 
  $todaytemperaturesoutsideall = mysqli_query($con,"SELECT temperature, time FROM TempOutside WHERE date(time) = CURDATE() ORDER by time") or die(mysqli_error($con));         
    $todaytemperaturesoutsideallJs=array();                                                     
           while($row = mysqli_fetch_assoc($todaytemperaturesoutsideall)){
             $date = strtotime($row['time']);     
	 $todaytemperaturesoutsideallJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['temperature'],2).' }'; }
   $todaytemperatureslivingroomall = mysqli_query($con,"SELECT temperature, time FROM TempLivingRoom WHERE date(time) = CURDATE() ORDER by time") or die(mysqli_error($con));         
    $todaytemperatureslivingroomallJs=array();                                                     
           while($row = mysqli_fetch_assoc($todaytemperatureslivingroomall)){
             $date = strtotime($row['time']);
	 $todaytemperatureslivingroomallJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['temperature'],2).' }'; }
   
   
     $todayhumidityoutsideall = mysqli_query($con,"SELECT humidity, time FROM Humidity WHERE date(time) = CURDATE() ORDER by time") or die(mysqli_error($con));         
    $todayhumidityoutsideallJs=array();                                                     
           while($row = mysqli_fetch_assoc($todayhumidityoutsideall)){
             $date = strtotime($row['time']);     
	 $todayhumidityoutsideallJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['humidity'],2).' }'; }
   
   
    $todaypressureoutsideall = mysqli_query($con,"SELECT pressure, time FROM PressureOutside WHERE date(time) = CURDATE() ORDER by time") or die(mysqli_error($con));         
    $todaypressureoutsideallJs=array();                                                     
           while($row = mysqli_fetch_assoc($todaypressureoutsideall)){
             $date = strtotime($row['time']);
	 $todaypressureoutsideallJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['pressure'],2).' }'; }
 
                                           
    $todaytemperaturesoutsideFull = mysqli_query($con,"SELECT temperature, time FROM TempOutside ORDER by time") or die(mysqli_error($con));         
    $todaytemperaturesoutsideFullJs=array();                                                     
           while($row = mysqli_fetch_assoc($todaytemperaturesoutsideFull)){
             $date = strtotime($row['time']);
	 $todaytemperaturesoutsideFullJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['temperature'],2).' }'; }



    $todaytemperatureslivingroomFull = mysqli_query($con,"SELECT temperature, time FROM TempLivingRoom ORDER by time") or die(mysqli_error($con));         
    $todaytemperatureslivingroomFullJs=array();                                                     
           while($row = mysqli_fetch_assoc($todaytemperatureslivingroomFull)){
             $date = strtotime($row['time']);
	 $todaytemperatureslivingroomFullJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['temperature'],2).' }'; }
   
    
   
   
   $todaypressureoutsideFull = mysqli_query($con,"SELECT pressure, time FROM PressureOutside ORDER by time") or die(mysqli_error($con));         
    $todaypressureoutsideFullJs=array();                                                     
           while($row = mysqli_fetch_assoc($todaypressureoutsideFull)){
             $date = strtotime($row['time']);
	 $todaypressureoutsideFullJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['pressure'],2).' }'; }
   
   $todayhumidityoutsideFull = mysqli_query($con,"SELECT humidity, time FROM Humidity ORDER by time") or die(mysqli_error($con));         
    $todayhumidityoutsideFullJs=array();                                                     
           while($row = mysqli_fetch_assoc($todayhumidityoutsideFull)){
             $date = strtotime($row['time']);
	 $todayhumidityoutsideFullJs[]='{ x: new Date('.date('Y,n,d,H,i', $date).'), y: '.round($row['humidity'],2).' }'; }

?>

<script>         
window.todaytemperaturesoutsideallJs = [<?= implode(',', $todaytemperaturesoutsideallJs) ?>];
window.todayhumidityoutsideallJs = [<?= implode(',', $todayhumidityoutsideallJs) ?>];
window.todaytemperatureslivingroomallJs = [<?= implode(',', $todaytemperatureslivingroomallJs) ?>];
window.todaypressureoutsideallJs = [<?= implode(',', $todaypressureoutsideallJs) ?>];
window.todaytemperaturesoutsideFullJs = [<?= implode(',', $todaytemperaturesoutsideFullJs) ?>];
window.todaytemperatureslivingroomFullJs = [<?= implode(',', $todaytemperatureslivingroomFullJs) ?>];
window.todaypressureoutsideFullJs = [<?= implode(',', $todaypressureoutsideFullJs) ?>];
window.todayhumidityoutsideFullJs = [<?= implode(',', $todayhumidityoutsideFullJs) ?>];
</script> 
<script src="js/vyvoj.js"></script>
<script src="js/canvasjs.min.js"></script>
<script src="js/jquery.canvasjs.min.js"></script>
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

   <div style="padding:0 16px;">

 <br>
<div id="chartDayTempContainer" style="height: 300px; width: 100%;"></div><br>
<div id="chartDayPresContainer" style="height: 300px; width: 100%;"></div><br>
<div id="chartDayHumContainer" style="height: 300px; width: 100%;"></div><br>
<div id="chartFullTempContainer" style="height: 300px; width: 100%;"></div><br>
<div id="chartFullPresContainer" style="height: 300px; width: 100%;"></div><br>  
<div id="chartFullHumContainer" style="height: 300px; width: 100%;"></div><br> 
</body>    
</html>


