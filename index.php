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
<meta name='charset' content="UTF-8">
<meta http-equiv="Cache-Control" content="no-cache">
<meta http-equiv="Pragma" content="no-cache">
<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="stylesheet" href="css/style.css">
<link rel="shortcut icon" type="image/x-icon" href="img/meteostation.ico">
<link rel="sitemap" type="application/xml" title="Mapa stránky" href="sitemap.xml">
<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['gauge']}]}"></script>
<?php include("connect.php"); ?>
 <?php
header('Content-Type: text/html; charset=utf-8'); 
 $temperatureOutside = mysqli_query($con,"SELECT `temperature`, `time` FROM `TempOutside` ORDER BY `time` DESC LIMIT 1") or die(mysqli_error($con));
 $temperatureOutsideJs = 0;
            while($line = mysqli_fetch_assoc($temperatureOutside)){
  
 $temperatureOutsideJs = $line['temperature'];
}
$temperatureLivingRoom = mysqli_query($con,"SELECT `temperature`, `time` FROM `TempLivingRoom` ORDER BY `time` DESC LIMIT 1") or die(mysqli_error($con));
 $temperatureLivingRoomJs = 0;
            while($line = mysqli_fetch_assoc($temperatureLivingRoom)){
  
 $temperatureLivingRoomJs = $line['temperature'];
}
$temperatureBedRoom = mysqli_query($con,"SELECT `humidity`, `time` FROM `Humidity` ORDER BY `time` DESC LIMIT 1") or die(mysqli_error($con));
 $temperatureBedRoomJs = 0;
            while($line = mysqli_fetch_assoc($temperatureBedRoom)){
  
 $temperatureBedRoomJs = $line['humidity'];
}
$pressureOutside = mysqli_query($con,"SELECT `pressure`, `time` FROM `PressureOutside` ORDER BY `time` DESC LIMIT 1") or die(mysqli_error($con));
 $pressureOutsideJs = 0;
            while($line = mysqli_fetch_assoc($pressureOutside)){
  
 $pressureOutsideJs = $line['pressure'];
}
?>
<script>
var temperatureOutsideJs = <?=$temperatureOutsideJs?>;
var temperatureLivingRoomJs = <?=$temperatureLivingRoomJs?>;
var temperatureBedRoomJs = <?=$temperatureBedRoomJs?>;
var pressureOutsideJs = <?=$pressureOutsideJs?>;
</script>
 <script src="js/poslednehodnoty.js"></script>   
</head>                                       

<body>
<ul class="topnav">
  <li><a class="active" href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
    </ul>                                          

<div style="padding:0 16px;">
<center><hr><h2>Posledné merania jednotlivých prístrojov</h2> <hr>

<div id="Outside_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="LivingRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="BedRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="Baro_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div><hr>
<h2>Tendencia</h2><hr>
 <div style="width: 200px; height: 200px; display: inline-block;"><?php $najvyssi = mysqli_query($con,"SELECT * FROM TempOutside WHERE id=(SELECT MAX(id) FROM TempOutside)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($najvyssi)){
$GLOBALS['highest_Outside'] = $line['temperature'];	
		
  }
  $druhynajvyssi = mysqli_query($con,"SELECT * FROM TempOutside WHERE id=(SELECT MAX(id)-1 FROM TempOutside)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($druhynajvyssi)){
		$GLOBALS['second_highest_Outside'] = $line['temperature'];	
  }
  if($GLOBALS['highest_Outside']<$GLOBALS['second_highest_Outside']) {
  $result = abs($GLOBALS['highest_Outside'] - $GLOBALS['second_highest_Outside']);  
  $down = '<img src="img/down.png" alt="down.png, 1,3kB" title="Klesajúca tendencia o: ' 
. $result . '°C" height="48" width="48">';
   
  echo $down; }
   if($GLOBALS['highest_Outside']>$GLOBALS['second_highest_Outside']) {
   $result = abs($GLOBALS['highest_Outside'] - $GLOBALS['second_highest_Outside']);
   $up = '<img src="img/up.png" alt="up.png, 2,5kB" title="Stúpajúca - tendencia o: ' 
. $result . '°C" height="48" width="48">';
   
echo $up;
  }
if($GLOBALS['highest_Outside']==$GLOBALS['second_highest_Outside']) { 
  $tie = '<img src="img/tie.png" alt="Tie.png, 1,3kB" title="Ustálená - Rozdiel 0°C" height="48" width="48">';  
  echo $tie; }?></div>
  <div style="width: 200px; height: 200px; display: inline-block;"><?php $najvyssi = mysqli_query($con,"SELECT * FROM TempLivingRoom WHERE id=(SELECT MAX(id) FROM TempLivingRoom)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($najvyssi)){
$GLOBALS['highest_LivingRoom'] = $line['temperature'];	
		
  }
  $druhynajvyssi = mysqli_query($con,"SELECT * FROM TempLivingRoom WHERE id=(SELECT MAX(id)-1 FROM TempLivingRoom)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($druhynajvyssi)){
		$GLOBALS['second_highest_LivingRoom'] = $line['temperature'];	
  }
 if($GLOBALS['highest_LivingRoom']<$GLOBALS['second_highest_LivingRoom']) {
  $result = abs($GLOBALS['highest_LivingRoom'] - $GLOBALS['second_highest_LivingRoom']);  
  $down = '<img src="img/down.png" alt="down.png, 1,3kB" title="Klesajúca tendencia o: ' 
. $result . '°C" height="48" width="48">';
   
  echo $down; }
   if($GLOBALS['highest_LivingRoom']>$GLOBALS['second_highest_LivingRoom']) {
   $result = abs($GLOBALS['highest_LivingRoom'] - $GLOBALS['second_highest_LivingRoom']);
   $up = '<img src="img/up.png" alt="up.png, 2,5kB" title="Stúpajúca - tendencia o: ' 
. $result . '°C" height="48" width="48">';
   
echo $up;
  }
if($GLOBALS['highest_LivingRoom']==$GLOBALS['second_highest_LivingRoom']) { 
  $tie = '<img src="img/tie.png" alt="Tie.png, 1,3kB" title="Ustálená - Rozdiel 0°C" height="48" width="48">';  
  echo $tie; }
?></div>
   <div style="width: 200px; height: 200px; display: inline-block;"><?php $najvyssi = mysqli_query($con,"SELECT * FROM Humidity WHERE id=(SELECT MAX(id) FROM Humidity)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($najvyssi)){
$GLOBALS['highest_BedRoom'] = $line['humidity'];	
		
  }
  $druhynajvyssi = mysqli_query($con,"SELECT * FROM Humidity WHERE id=(SELECT MAX(id)-1 FROM Humidity)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($druhynajvyssi)){
		$GLOBALS['second_highest_BedRoom'] = $line['humidity'];	
  }
  if($GLOBALS['highest_BedRoom']<$GLOBALS['second_highest_BedRoom']) {
  $result = abs($GLOBALS['highest_BedRoom'] - $GLOBALS['second_highest_BedRoom']);  
  $down = '<img src="img/down.png" alt="down.png, 1,3kB" title="Klesajúca tendencia o: ' 
. $result . '%" height="48" width="48">';
   
  echo $down; }
   if($GLOBALS['highest_BedRoom']>$GLOBALS['second_highest_BedRoom']) {
   $result = abs($GLOBALS['highest_BedRoom'] - $GLOBALS['second_highest_BedRoom']);
   $up = '<img src="img/up.png" alt="up.png, 2,5kB" title="Stúpajúca - tendencia o: ' 
. $result . '%" height="48" width="48">';
   
echo $up;
  }
if($GLOBALS['highest_BedRoom']==$GLOBALS['second_highest_BedRoom']) { 
  $tie = '<img src="img/tie.png" alt="Tie.png, 1,3kB" title="Ustálená - Rozdiel 0%" height="48" width="48">';  
  echo $tie; }
?></div>
    <div style="width: 200px; height: 200px; display: inline-block;"> <?php  $najvyssi = mysqli_query($con,"SELECT * FROM PressureOutside WHERE id=(SELECT MAX(id) FROM PressureOutside)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($najvyssi)){
$GLOBALS['highest_PressureOutside'] = $line['pressure'];	
		
  }
  $druhynajvyssi = mysqli_query($con,"SELECT * FROM PressureOutside WHERE id=(SELECT MAX(id)-1 FROM PressureOutside)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($druhynajvyssi)){
		$GLOBALS['second_PressureOutside'] = $line['pressure'];	
  }
 if($GLOBALS['highest_PressureOutside']<$GLOBALS['second_PressureOutside']) {
  $result = abs($GLOBALS['highest_PressureOutside'] - $GLOBALS['second_PressureOutside']);  
  $down = '<img src="img/down.png" alt="down.png, 1,3kB" title="Klesajúca tendencia o: ' 
. $result . 'hPa" height="48" width="48">';
   
  echo $down; }
   if($GLOBALS['highest_PressureOutside']>$GLOBALS['second_PressureOutside']) {
   $result = abs($GLOBALS['highest_PressureOutside'] - $GLOBALS['second_PressureOutside']);
   $up = '<img src="img/up.png" alt="up.png, 2,5kB" title="Stúpajúca tendencia o: ' 
. $result . 'hPa" height="48" width="48">';
   
echo $up;
  }
if($GLOBALS['highest_PressureOutside']==$GLOBALS['second_PressureOutside']) { 
  $tie = '<img src="img/tie.png" alt="Tie.png, 1,3kB" title="Ustálený tlak" height="48" width="48">';  
  echo $tie; }
?></div><hr>
</center>
</div>

</body>
</html>


