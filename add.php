<?php
header('Content-Type: text/html; charset=utf-8'); 
 include ("connect.php");
	$temp1=$_GET["temp1"];
  $temp2=$_GET["temp2"];
  $pres1=$_GET["pres1"];
  $hum1=$_GET["hum1"];
  
$ins = mysqli_query($con,"INSERT INTO `TempOutside` (`temperature`) VALUES ('".$_GET["temp1"]."')") or die (mysqli_error($con)); 
$ins2 = mysqli_query($con,"INSERT INTO `TempLivingRoom` (`temperature`) VALUES ('".$_GET["temp2"]."')") or die (mysqli_error($con));
$ins3 = mysqli_query($con,"INSERT INTO `PressureOutside` (`pressure`) VALUES ('".$_GET["pres1"]."')") or die (mysqli_error($con)); 
$ins4 = mysqli_query($con,"INSERT INTO `Humidity` (`humidity`) VALUES ('".$_GET["hum1"]."')") or die (mysqli_error($con));  
   
?>