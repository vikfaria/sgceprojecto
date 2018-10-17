<?php

require_once ('../../Connections/connection.php');
require_once ('../../get/variaveis.php');
include ("../../Classes/classes.php");

$id = $_POST['apaga']; 

echo "simmmmmmmmmmmmmm";

echo  $sql = "DELETE FROM `tblpresenca` WHERE id_presenca = '$id'";

$stmt=mysqli_query($con, $sql);

if($stmt)
{
	echo 1;
}

?>