
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
<body>
<?php include("connect.php"); ?>
<ul class="topnav">
  <li><a href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a  href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a class="active" href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
  </ul>                                          

   <div style="padding:0 16px;">
     <form method="post" id="releformular" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
   <input type="hidden" name="changeIt" value="yes">
	<h1>Prognóza počasia</h1>
  <fieldset>
		<legend>K: <?php $cas = mysqli_query($con,"SELECT * FROM PressureOutside WHERE id=(SELECT MAX(id) FROM PressureOutside)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($cas)){
		$casik = $line['time'];
    echo $casik;  }?></legend>
		    
		
		
	

   
 <?php  
$summer1 = strtotime("01 May");
$summer2 = strtotime("30 September");
$winter1 = strtotime("01 October");
$winter2 = strtotime("30 April");
$today = time();
//TEMP--------------------------------------------------------
$temperatureOutside = mysqli_query($con,"SELECT `temperature`, `time` FROM `TempOutside` ORDER BY `time` DESC LIMIT 1") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($temperatureOutside)){
$temperature = $line['temperature'];
}
//PRESSURE--------------------------------------------------------------------
$pressureOutside = mysqli_query($con,"SELECT * FROM PressureOutside WHERE id=(SELECT MAX(id) FROM PressureOutside)") or die(mysqli_error($con));
while($line = mysqli_fetch_assoc($pressureOutside)){
$pressure = $line['pressure'];}

$pressureOutsidesecond = mysqli_query($con,"SELECT * FROM PressureOutside WHERE id=(SELECT MAX(id)-1 FROM PressureOutside)") or die(mysqli_error($con));
while($row = mysqli_fetch_assoc($pressureOutsidesecond)){
$secondpressure = $row['pressure'];	
  }
//END PRESSURE--------------------------------------------------------------------  
if($summer1 <= $today && $today <= $summer2)
{  echo 'Obdobie: 1. máj - 30. september <br />';  
                 
$burky = range(900,999.99);
$nepriaznivo_prehanky_veterno_chladno = range(1000,1011.99);
$striedavo_oblacno_sklon_k_zrazkam_pri_vyssej_teplote = range(1012,1014.99);
$striedavo_zlepsenie = range(1015,1020.99);
$oblacno_mala_pravdepodobnost_zrazok = range(1021,1027.99);
$pekne_sucho = range(1028,1100);
//KONIEC INSTANCII
if(MIN($burky) <= $pressure && $pressure <=  MAX($burky))  //0
{
if($pressure>=$secondpressure) {echo 'Búrky, teplo';}
if($pressure<$secondpressure) {echo 'Zvrat počasia, búrky, ochladenie';}

}
if(MIN($nepriaznivo_prehanky_veterno_chladno) <= $pressure && $pressure <=  MAX($nepriaznivo_prehanky_veterno_chladno))    //1
{
if($pressure>=$secondpressure) {echo 'Teplo, sklon k burkam, zmena počasia malo pravdepodobna';}
if($pressure<$secondpressure) {echo 'Oblačnosť, veľké teplo, sklon k zrážkam, búrkam, zvrat pravdepodobný';}
}
if(MIN($striedavo_oblacno_sklon_k_zrazkam_pri_vyssej_teplote) <= $pressure && $pressure <=  MAX($striedavo_oblacno_sklon_k_zrazkam_pri_vyssej_teplote)) //2
{
if($pressure>=$secondpressure) {echo 'Striedavo/oblacno, sklon k zražkam pri vyššej teplote, pri vysokej teplote burky';}
if($pressure<$secondpressure) {echo 'Striedavo/oblačno, sucho, pri teplote vyššej burky';}
}
if(MIN($striedavo_zlepsenie) <= $pressure && $pressure <=  MAX($striedavo_zlepsenie))   //3
{
if($pressure>=$secondpressure) {echo 'Polojasno, možné prehánky i búrky';}
if($pressure<$secondpressure) {echo 'Polojasno, sklon k prehánkam i búrkam';}
}
if(MIN($oblacno_mala_pravdepodobnost_zrazok) <= $pressure && $pressure <=  MAX($oblacno_mala_pravdepodobnost_zrazok))  //4
{
if($pressure>=$secondpressure) {echo 'Malá pravdepodobnosť zrážok, chladnejšie';}
if($pressure<$secondpressure) {echo 'Striedavo/oblačno, miestami slabé prehánky, búrky';}
}
if(MIN($pekne_sucho) <= $pressure && $pressure <=  MAX($pekne_sucho))   //5
{
if($pressure>=$secondpressure) {echo 'Pekné počasie, teplota normálna';}
 if($pressure<$secondpressure) {echo 'Jasno, sucho, teplota normál';}
}

}
else
{   echo 'Obdobie: 1. október - 30. apríl <br />';     

$burky = range(900,986.99);
$zamracene_zrazky_pri_rychlom_stupani_tlaku_zlepsenie = range(987,999.99);
$zamracene_sklon_k_zrazkam_pri_rychlom_stupani_tlaku_zlepsenie_ochladenie = range(1000,1012.99);
$hmly_pretrvava_doterajsie_pocasie_mala_pravdepodobnost_zrazok = range(1013,1027.99);
$bez_zrazok_mrazy_pri_pomalom_stupani_zrazky_pri_rychlom_zlepsenie_pri_pomalom_zhorsenie_zrazky = range(1028,1100);
if(MIN($burky) <= $pressure && $pressure <=  MAX($burky))
{
if($pressure>=$secondpressure) {echo 'Búrky/Silný vietor - víchrica';}
 if($pressure<$secondpressure) {echo 'Búrky/Silný vietor - víchrica';}
}
if(MIN($zamracene_zrazky_pri_rychlom_stupani_tlaku_zlepsenie) <= $pressure && $pressure <=  MAX($zamracene_zrazky_pri_rychlom_stupani_tlaku_zlepsenie))
{
if($pressure>=$secondpressure) {echo 'Zamračené, zrážky, zlepšenie počasia';}
 if($pressure<$secondpressure) {echo 'Oteplenie, odmäk, môžnosť zrážok, veterno';}
}
if(MIN($zamracene_sklon_k_zrazkam_pri_rychlom_stupani_tlaku_zlepsenie_ochladenie) <= $pressure && $pressure <=  MAX($zamracene_sklon_k_zrazkam_pri_rychlom_stupani_tlaku_zlepsenie_ochladenie))
{
if($pressure>=$secondpressure) {echo 'Sklon k zrážkam, mierne zlepšenie';}
 if($pressure<$secondpressure) {echo 'Malá zmena počasia, oteplenie, veterno';}
}
if(MIN($hmly_pretrvava_doterajsie_pocasie_mala_pravdepodobnost_zrazok) <= $pressure && $pressure <=  MAX($hmly_pretrvava_doterajsie_pocasie_mala_pravdepodobnost_zrazok))
{
if($pressure>=$secondpressure) {echo 'Ustálené počasie, hmly';}
 if($pressure<$secondpressure) {echo 'Oblačnosť, bez silnejších zrážok, oteplenie, hmly';}
}
if(MIN($bez_zrazok_mrazy_pri_pomalom_stupani_zrazky_pri_rychlom_zlepsenie_pri_pomalom_zhorsenie_zrazky) <= $pressure && $pressure <=  MAX($bez_zrazok_mrazy_pri_pomalom_stupani_zrazky_pri_rychlom_zlepsenie_pri_pomalom_zhorsenie_zrazky))
{
if($pressure>=$secondpressure) {echo 'Bez zrážok, mrazy, za slabého vetra hmly';}
 if($pressure<$secondpressure) {echo 'Bez zrážok, ustálené počasie, hmly.';}
}




}

?>
	</fieldset>
   </form>
  </div>         

</body>
</html>


