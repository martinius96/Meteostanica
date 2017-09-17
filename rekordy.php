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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-76290977-2', 'auto');
  ga('send', 'pageview');

</script>

<script type="text/javascript" src="https://www.google.com/jsapi?autoload={'modules':[{'name':'visualization','version':'1','packages':['gauge']}]}"></script>
<?php include("connect.php"); 
header('Content-Type: text/html; charset=utf-8'); ?>
 <?php
  $highesttempoutsidetoday = mysqli_query($con,"SELECT MAX(temperature) AS NajvyssiVondnes, time FROM TempOutside WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
    $highesttempoutsidetodayJs=0;     
           while($row = mysqli_fetch_assoc($highesttempoutsidetoday)){
	 $highesttempoutsidetodayJs = round($row['NajvyssiVondnes'],2); }

  $highesttemplivingroomtoday = mysqli_query($con,"SELECT MAX(temperature) AS NajvyssiLivingRoomdnes, time FROM TempLivingRoom WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $highesttemplivingroomtodayJs=0;
           while($row = mysqli_fetch_assoc($highesttemplivingroomtoday)){
	$highesttemplivingroomtodayJs = round($row['NajvyssiLivingRoomdnes'],2); } 

  $highesttempbedroomtoday = mysqli_query($con,"SELECT MAX(humidity) AS NajvyssiBedRoomdnes, time FROM Humidity WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
  $highesttempbedroomtodayJs=0;
           while($row = mysqli_fetch_assoc($highesttempbedroomtoday)){
	$highesttempbedroomtodayJs = round($row['NajvyssiBedRoomdnes'],2); } 
  $highestpresoutsidetoday = mysqli_query($con,"SELECT MAX(pressure) AS Najvyssitlakvondnes, time FROM PressureOutside WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $highestpresoutsidetodayJs=0;
           while($row = mysqli_fetch_assoc($highestpresoutsidetoday)){
	$highestpresoutsidetodayJs=round($row['Najvyssitlakvondnes'],2); }  
  $lowesttempoutsidetoday = mysqli_query($con,"SELECT MIN(temperature) AS NajnizsiVondnes, time FROM TempOutside WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
    $lowesttempoutsidetodayJs=0;     
           while($row = mysqli_fetch_assoc($lowesttempoutsidetoday)){
	 $lowesttempoutsidetodayJs = round($row['NajnizsiVondnes'],2); }

  $lowesttemplivingroomtoday = mysqli_query($con,"SELECT MIN(temperature) AS NajnizsiLivingRoomdnes, time FROM TempLivingRoom WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $lowesttemplivingroomtodayJs=0;
           while($row = mysqli_fetch_assoc($lowesttemplivingroomtoday)){
	$lowesttemplivingroomtodayJs = round($row['NajnizsiLivingRoomdnes'],2); } 

  $lowesttempbedroomtoday = mysqli_query($con,"SELECT MIN(humidity) AS NajnizsiBedRoomdnes, time FROM Humidity WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
  $lowesttempbedroomtodayJs=0;
           while($row = mysqli_fetch_assoc($lowesttempbedroomtoday)){
	$lowesttempbedroomtodayJs = round($row['NajnizsiBedRoomdnes'],2); } 
  $lowestpresoutsidetoday = mysqli_query($con,"SELECT MIN(pressure) AS Najnizsitlakvondnes, time FROM PressureOutside WHERE date(time) = CURDATE()") or die(mysqli_error($con));         
   $lowestpresoutsidetodayJs=0;
           while($row = mysqli_fetch_assoc($lowestpresoutsidetoday)){
	$lowestpresoutsidetodayJs=round($row['Najnizsitlakvondnes'],2); } 

 $avgtempoutside = mysqli_query($con,"SELECT AVG(temperature) AS PriemerVon  FROM TempOutside") or die(mysqli_error($con));
  $avgtemperatureOutsideJs=0;         
           while($line = mysqli_fetch_array($avgtempoutside)){
$avgtemperatureOutsideJs = round($line['PriemerVon'],2);
} 
 $avgtemplivingroom = mysqli_query($con,"SELECT AVG(temperature) AS PriemerObyvacka  FROM TempLivingRoom") or die(mysqli_error($con));
  $avgtemperatureLivingRoomJs=0;         
           while($line = mysqli_fetch_array($avgtemplivingroom)){
$avgtemperatureLivingRoomJs = round($line['PriemerObyvacka'],2);
}
 $avgtempbedroom = mysqli_query($con,"SELECT AVG(humidity) AS PriemerSpalna  FROM Humidity") or die(mysqli_error($con));
  $avgtemperatureBedRoomJs=0;         
           while($line = mysqli_fetch_array($avgtempbedroom)){
$avgtemperatureBedRoomJs = round($line['PriemerSpalna'],2);
} 
 $avgpresoutside = mysqli_query($con,"SELECT AVG(pressure) AS PriemerTlak  FROM PressureOutside") or die(mysqli_error($con));
  $avgpressureOutsideJs=0;         
           while($line = mysqli_fetch_array($avgpresoutside)){
$avgpressureOutsideJs = round($line['PriemerTlak'],2);
} 

 $highesttempoutside = mysqli_query($con,"SELECT MAX(temperature) AS NajvyssiVon  FROM TempOutside") or die(mysqli_error($con));
  $highesttemperatureOutsideJs=0;         
           while($line = mysqli_fetch_array($highesttempoutside)){
$highesttemperatureOutsideJs = round($line['NajvyssiVon'],2);
} 
 $highesttemplivingroom = mysqli_query($con,"SELECT MAX(temperature) AS NajvyssiObyvacka  FROM TempLivingRoom") or die(mysqli_error($con));
  $highesttemperatureLivingRoomJs=0;         
           while($line = mysqli_fetch_array($highesttemplivingroom)){
$highesttemperatureLivingRoomJs = round($line['NajvyssiObyvacka'],2);
}
 $highesttempbedroom = mysqli_query($con,"SELECT MAX(humidity) AS NajvyssiSpalna  FROM Humidity") or die(mysqli_error($con));
  $highesttemperatureBedRoomJs=0;         
           while($line = mysqli_fetch_array($highesttempbedroom)){
$highesttemperatureBedRoomJs = round($line['NajvyssiSpalna'],2);
} 
 $highestpresoutside = mysqli_query($con,"SELECT MAX(pressure) AS NajvyssiTlak  FROM PressureOutside") or die(mysqli_error($con));
  $highestpressureOutsideJs=0;         
           while($line = mysqli_fetch_array($highestpresoutside)){
$highestpressureOutsideJs = round($line['NajvyssiTlak'],2);
}
 $lowesttempoutside = mysqli_query($con,"SELECT MIN(temperature) AS NajnizsiVon  FROM TempOutside") or die(mysqli_error($con));
  $lowesttemperatureOutsideJs=0;         
           while($line = mysqli_fetch_array($lowesttempoutside)){
$lowesttemperatureOutsideJs = round($line['NajnizsiVon'],2);
} 
 $lowesttemplivingroom = mysqli_query($con,"SELECT MIN(temperature) AS NajnizsiObyvacka  FROM TempLivingRoom") or die(mysqli_error($con));
  $lowesttemperatureLivingRoomJs=0;         
           while($line = mysqli_fetch_array($lowesttemplivingroom)){
$lowesttemperatureLivingRoomJs = round($line['NajnizsiObyvacka'],2);
}
 $lowesttempbedroom = mysqli_query($con,"SELECT MIN(humidity) AS NajnizsiSpalna  FROM Humidity") or die(mysqli_error($con));
  $lowesttemperatureBedRoomJs=0;         
           while($line = mysqli_fetch_array($lowesttempbedroom)){
$lowesttemperatureBedRoomJs = round($line['NajnizsiSpalna'],2);
} 
 $lowestpresoutside = mysqli_query($con,"SELECT MIN(pressure) AS NajnizsiTlak  FROM PressureOutside") or die(mysqli_error($con));
  $lowestpressureOutsideJs=0;         
           while($line = mysqli_fetch_array($lowestpresoutside)){
$lowestpressureOutsideJs = round($line['NajnizsiTlak'],2);
}  
 


?>
<script>
var highesttemperatureOutsideTodayJs = <?=$highesttempoutsidetodayJs?>;
var highesttemperatureLivingRoomTodayJs = <?=$highesttemplivingroomtodayJs?>;
var highesttemperatureBedRoomTodayJs = <?=$highesttempbedroomtodayJs?>;
var highestpressureOutsideTodayJs = <?=$highestpresoutsidetodayJs?>;
var lowesttemperatureOutsideTodayJs = <?=$lowesttempoutsidetodayJs?>;
var lowesttemperatureLivingRoomTodayJs = <?=$lowesttemplivingroomtodayJs?>;
var lowesttemperatureBedRoomTodayJs = <?=$lowesttempbedroomtodayJs?>;
var lowestpressureOutsideTodayJs = <?=$lowestpresoutsidetodayJs?>;
var avgtemperatureOutsideJs = <?=$avgtemperatureOutsideJs?>;
var avgtemperatureLivingRoomJs = <?=$avgtemperatureLivingRoomJs?>;
var avgtemperatureBedRoomJs = <?=$avgtemperatureBedRoomJs?>;
var avgpressureOutsideJs = <?=$avgpressureOutsideJs?>;
var highesttemperatureOutsideJs = <?=$highesttemperatureOutsideJs?>;
var highesttemperatureLivingRoomJs = <?=$highesttemperatureLivingRoomJs?>;
var highesttemperatureBedRoomJs = <?=$highesttemperatureBedRoomJs?>;
var highestpressureOutsideJs = <?=$highestpressureOutsideJs?>;
var lowesttemperatureOutsideJs = <?=$lowesttemperatureOutsideJs?>;
var lowesttemperatureLivingRoomJs = <?=$lowesttemperatureLivingRoomJs?>;
var lowesttemperatureBedRoomJs = <?=$lowesttemperatureBedRoomJs?>;
var lowestpressureOutsideJs = <?=$lowestpressureOutsideJs?>;
</script>    
 <script src="js/hodnoty_suhrn.js"></script>
</head>
<body>
<ul class="topnav">
  <li><a href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a class="active" href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
   <li class=right><a href="kontakt.php"><img src="img/chat.png" alt="chat.png, 1,2kB" title="Kontakt" height="64" width="64"></a></li>
 </ul>                                          

<div style="padding:0 16px;">
<hr><center><h2>Dnešné maximum</h2><hr>
<div id="HighestOutsideToday_chart_div" style="width: 200px; height: 200px; display: inline-block;" title=""></div>     
<div id="HighestLivingRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="HighestBedRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>          
<div id="HighestBaroToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<hr><center><h2>Dnešné minimum</h2><hr>
<div id="LowestOutsideToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>    
<div id="LowestLivingRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="LowestBedRoomToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>          
<div id="LowestBaroToday_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<hr><center><h2>Dlhodobý priemer</h2><hr>
<div id="AvgOutside_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>  
<div id="AvgLivingRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="AvgBedRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>          
<div id="AvgBaro_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
 <hr><center><h2>Najvyššie hodnoty</h2><hr> 
 <div id="HighestOutside_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="HighestLivingRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="HighestBedRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="HighestBaro_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div> 
<hr><center><h2>Najnižšie hodnoty</h2><hr> 
 <div id="LowestOutside_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="LowestLivingRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="LowestBedRoom_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>
<div id="LowestBaro_chart_div" style="width: 200px; height: 200px; display: inline-block;"></div>       
         </center>
</div>

</body>
</html>


