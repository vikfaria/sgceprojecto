<?php

require_once ('../../Connections/connection.php');
require_once ('../../get/variaveis.php');
require_once ('../../classes/classes.php');

$id = $_POST['id'];
$loc = $_POST['location'];
$lat =  $_POST['latitude'];
$longi = $_POST['longitude'];

 if($loc == ''){
	$loc = 0;
	}
 if($lat == ''){
	$lat = 0;
   } 
  if($longi == ''){
	 $longi = 0;
 }
	 

$estadopresente = $_POST['estadopresente']; 
date_default_timezone_set('Africa/Maputo');
$date = date("Y-m-d");
$hora = date("H:i:s"); 

$sql = "UPDATE `tblpresenca` SET  `data_presenca`= '$date', `hora_presenca` = '$hora', `latitude`='$lat',`longitude`='$longi',`nome_rua`='$loc', `id_estadopresenca`= '$estadopresente' WHERE `id_presenca` = '$id'";


$stmt=mysqli_query($con, $sql);

if($stmt)
{
	echo 1;
}

?>