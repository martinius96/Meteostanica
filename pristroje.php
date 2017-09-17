<!DOCTYPE html>
<html>
    
<head>
<?php header('Content-Type: text/html; charset=utf-8');  ?>
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
<?php include ("connect.php");?>
<body>
<ul class="topnav">
  <li><a href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a  href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a class="active" href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
   <li class=right><a href="kontakt.php"><img src="img/chat.png" alt="chat.png, 1,2kB" title="Kontakt" height="64" width="64"></a></li>
 </ul>                                          

<div style="padding:0 16px;">
<center><h2>Všetky namerané hodnoty sú zaznamenávané senzormi, ktoré odovzdávajú svoje namerané hodnoty mikropočítaču, ktorý ich zároveň napája a namerané dáta odosiela na webserver.</h2></center>
<hr>
<h2>Teploty: Maxim (Dallas) DS18B20</h2> <img src="http://miniimg5.rightinthebox.com/images/128x128/201604/ippirp1460513516671.jpg" alt="DS18B20 indoor" title="DS18B20 indoor"> <img src="https://www.espruino.com/refimages/DS18B20_cable.jpg" style="width:40%; height:50%;" alt="DS18B20 outdoor" title="DS18B20 outdoor">
Odchýlka: ±0.5°C | Napájanie: 3.3V + 4,7kΩ rezistor

Odosielanie hodnôt: Onewire protokol (po 1 vodiči)
<hr>
<h2>Tlak: BMP280</h2> <img src="http://product.ic114.com/IMAGE/PRODUCT/IMAGE1/bmp2801.jpg" alt="BMP 280 senzor" title="BMP 280 senzor">
Odchýlka: ±1hPa | Rozhranie: I2C
<hr>
<h2>Relé: FINDER 36.11.9.005.4011</h2> <img src="http://thumbs3.picclick.com/d/l400/pict/361746959730_/Finder-361190054011-Relais-5V-DC-1xUM-10A-70R.jpg" alt="Relé FINDER" title="Relé FINDER">
Limit: 10A pri 250V~ | Zopnutie pri 5V-
<hr>
<h2>Tlak: DHT12</h2> <img src="https://www.letscontrolit.com/wiki/images/thumb/4/48/DHT12.png/320px-DHT12.png" alt="DHT12" title="RDHT12">
Odchýlka: 0,1%  | Rozsah: 20-95%
<hr>
<h2>Odosielanie na webserver: UNO R3 + Ethernet Shield</h2> <img src="http://img.banggood.com/images/2014/xiemeijuan/11/SKU099516SKU066313/SKU083549C.jpg" alt="Arduino Uno + Ethernet Shield" title="Arduino Uno + Ethernet Shield">
<hr>
</div>
</body>
</html>


