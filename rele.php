
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
</head>
<?php include("connect.php"); ?>
 
<body>
<ul class="topnav">
  <li><a href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a  href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a class="active"href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
   </ul>                                          

   <div style="padding:0 16px;">
  
  <?php
  if(isset($_POST["changeIt"])) {
    if(file_get_contents("readme.txt") === "1") {
      file_put_contents("readme.txt", 0);
    }
    else { 
      file_put_contents("readme.txt", 1);
    }
  }
  ?>
   <form method="post" id="releformular" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
   <input type="hidden" name="changeIt" value="yes">
	<h1>Ovládanie relé v domácnosti</h1>
  <fieldset>
		<legend>Relé v obývačke</legend>
		<label onClick="document.getElementById('releformular').submit();">
			<input name="releon" type="checkbox" <?php if(file_get_contents("readme.txt") === "1") echo "checked"; ?>>
			<div>
				<span class="yes">ZAP</span>                                              
				<span class="no">VYP</span>
			</div>         
			<a class="slider"></a>
		</label>	
	</fieldset>
   </form>
	
	
 
  </div>

</body>
</html>


