<?php

$password = "";
$hostname = "localhost";
$username="root";
$password="";
$database="sgce";



$con=mysqli_connect($hostname, $username,$password) or trigger_error(mysqli_error(),E_USER_ERROR);

mysqli_query($con,"SET NAMES UTF8");
?>