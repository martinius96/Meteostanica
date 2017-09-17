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

<?php include("connect.php"); ?>
</head>
<body>
<ul class="topnav">
  <li><a href="index.php"><img src="img/gauge.png" alt="Aktuálne merania"></a></li>
  <li><a href="zaznamy.php"><img src="img/newspaper.png" alt="newspaper.png, 935B" title="Záznamy" height="64" width="64"></a></li>
  <li><a  href="rekordy.php"><img src="img/trophy.png" alt="trophy.png, 1,9kB" title="Rekordy" height="64" width="64"></a></li>
  <li><a href="vyvoj.php"><img src="img/chart.png" alt="chart.png, 1,2kB" title="Vývoj" height="64" width="64"></a></li>
  <li><a href="rele.php"><img src="img/switch.png" alt="switch.png, 1,9kB" title="Relé" height="64" width="64"></a></li>
   <li><a  href="pristroje.php"><img src="img/settings.png" alt="settings.png, 1,5kB" title="Prístroje" height="64" width="64"></a></li>
    <li><a href="prognoza.php"><img src="img/sunny.png" alt="sunny.png, 1,2kB" title="Prognóza" height="64" width="64"></a></li>
   <li class=right><a class="active" href="kontakt.php"><img src="img/chat.png" alt="chat.png, 1,2kB" title="Kontakt" height="64" width="64"></a></li>
 </ul>                                          

<div style="padding:0 16px;">

 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" style="width: 300px;">
 <h1>Kontaktujte administrátora</h1>
  <fieldset>
		<legend>Správa</legend>
<input name="name" type="text" placeholder="Meno a priezvisko" style="display: inline;" required>
<input name="email" type="email" placeholder=" Váš e-mail" style="display: inline;" required>
<textarea name="textarea" placeholder="Správa - max 10000 znakov" style="display: inline; max-width: 250px;" required></textarea> <br>
<input type="submit" name="odoslat"value="Odoslať" style="display: inline;">
	</fieldset>                                                                    
 </form> 
    <?php
header('Content-Type: text/html; charset=utf-8'); 
if(isset($_POST['odoslat'])){   
$username = mysqli_real_escape_string($con, $_POST['name']);
   $username = htmlspecialchars( $username, ENT_QUOTES, 'UTF-8' );
   $username = trim( $username );
   $username = strip_tags($username);
   $email = mysqli_real_escape_string($con, $_POST['email']);        
   $email = htmlspecialchars( $email, ENT_QUOTES, 'UTF-8' );
   $email = trim( $email );
   $email = strip_tags($email);
   $textarea = mysqli_real_escape_string($con, $_POST['textarea']);
   $textarea = htmlspecialchars( $textarea, ENT_QUOTES, 'UTF-8' );
   $textarea = trim( $textarea );
   $textarea = strip_tags($textarea);

     if($username == "" || $textarea == "" || $email == ""){
    echo "Na niečo si zabudol!";
  }else{
     $ins = mysqli_query($con,"INSERT INTO `ContactAdministrator` (`username`,`email`,`message`) VALUES ('$username', '$email', '$textarea')") or die(mysqli_error($con));
    echo "Ďakujem za dotaz/správu budem sa vám snažiť odpovedať ako najskôr to bude možné!";       
     }
     }
    
    ?>
  </div>
</body>
</html>




