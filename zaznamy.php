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

</head>
<body>
<?php include("connect.php"); 
header('Content-Type: text/html; charset=utf-8'); ?>
<ul class="topnav">
  <li><a  href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a class="active" href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
   <li class=right><a href="kontakt.php"><img src="img/chat.png" alt="chat.png, 1,2kB" title="Kontakt" height="64" width="64"></a></li>
 </ul>

<div class="container">
<div class="floatLeft">   <hr>
<center><h2>Teploty von</h2></center> <hr>
<table>
<thead><tr><th width=30%>Číslo záznamu</th>&nbsp;<th width=45%>Teplota</th>&nbsp;<th width=60%>Čas</th></tr>
<tbody> 


<?php
 	$temperaturesLivingRoom = mysqli_query($con,"SELECT * FROM TempOutside ORDER BY id DESC LIMIT 30") or die(mysqli_error($con));
	
		while($line = mysqli_fetch_assoc($temperaturesLivingRoom)){
			echo "<tr>";
      echo "<td><i>" . $line['id'] ."</i></td>";
			echo "<td><i>" . $line['temperature'] . " °C" . "</i></td>";
      echo "<td><i>". $line['time'] . "</i></td>";
			
	
		
			echo "</tr>";
		}  ?> </tbody></table>
</div>

<div class="floatRight">   <hr>
<center><h2>Teploty v obývačke</h2></center><hr>
<table>
<thead><tr><th width=30%>Číslo záznamu</th>&nbsp;<th width=45%>Teplota</th>&nbsp;<th width=60%>Čas</th></tr>
<tbody>
<?php
 	$temperaturesLivingRoom = mysqli_query($con,"SELECT * FROM TempLivingRoom ORDER BY id DESC LIMIT 30") or die(mysqli_error($con));
		while($line = mysqli_fetch_assoc($temperaturesLivingRoom)){
			echo "<tr>";
      echo "<td><i>" . $line['id'] ."</i></td>";
			echo "<td><i>" . $line['temperature'] . " °C" . "</i></td>";
      echo "<td><i>". $line['time'] . "</i></td>";
			echo "</tr>";
		}  ?> </tbody></table>
</div>
<div class="floatLeft">
<hr>
 <center><h2>Vlhkosť vzduchu</h2></center>  
 <hr>                     <table>
<thead><tr><th width=30%>Číslo záznamu</th>&nbsp;<th width=45%>Vlhkosť</th>&nbsp;<th width=60%>Čas</th></tr>
<tbody> 


<?php
 	$temperaturesBedRoom = mysqli_query($con,"SELECT * FROM Humidity ORDER BY id DESC LIMIT 30") or die(mysqli_error($con));
	
		while($line = mysqli_fetch_assoc($temperaturesBedRoom)){
			echo "<tr>";
      echo "<td><i>" . $line['id'] ."</i></td>";
			echo "<td><i>" . $line['humidity'] . " %" . "</i></td>";
      echo "<td><i>". $line['time'] . "</i></td>";
			
	
		
			echo "</tr>";
		}  ?> </tbody></table> </div>
    
     <div class="floatRight">
     <hr>
     <center><h2>Atmosferický tlak</h2></center>
     <hr>
    <table>
<thead><tr><th width=30%>Číslo záznamu</th>&nbsp;<th width=45%>Tlak</th>&nbsp;<th width=60%>Čas</th></tr>
<tbody> 


<?php
 	$pressureOutside = mysqli_query($con,"SELECT * FROM PressureOutside ORDER BY id DESC LIMIT 30") or die(mysqli_error($con));
	
		while($line = mysqli_fetch_assoc($pressureOutside)){
			echo "<tr>";
      echo "<td><i>" . $line['id'] ."</i></td>";
			echo "<td><i>" . $line['pressure'] . " hPa" . "</i></td>";
      echo "<td><i>". $line['time'] . "</i></td>";
			
	
		
			echo "</tr>";
		}  ?> </tbody></table>
    
 </div>   
</div>

</body>
</html>

                                                           