<?php
 include ("connect.php");
 $temp1 = $_GET["temp1"];
 $t2 = $_GET["tempinside"];
 $p = $_GET["pressure"];
 $h = $_GET["humidity"];
 if($temp1== "" || $t2=="" || $p=="" || $h=="" || $temp1== 0 || $t2==0 || $p==0 || $h==0 || $temp1< -40 || $t2< -40 || $temp1>50 || $t2>50 || $p>1050 || $p<950 || $h==0.01 || $h==0.02 || $h==0.03 || $h==95){
 	echo 'Zabránenie nesprávnemu typu/hodnote dát uložiť sa do databázy!';
 }
 else{
$ins = mysqli_query($con,"INSERT INTO `TempOutside` (`temperature`) VALUES ('".$temp1."')") or die (mysqli_error($con)); 
$ins2 = mysqli_query($con,"INSERT INTO `TempLivingRoom` (`temperature`) VALUES ('".$t2."')") or die (mysqli_error($con));
$ins3 = mysqli_query($con,"INSERT INTO `PressureOutside` (`pressure`) VALUES ('".$p."')") or die (mysqli_error($con)); 
$ins4 = mysqli_query($con,"INSERT INTO `Humidity` (`humidity`) VALUES ('".$h."')") or die (mysqli_error($con));  
   }
?>