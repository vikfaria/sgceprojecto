<?php
session_start();
$idUser = $_SESSION['idUserFluxo'];
if(!$idUser)
	header("location: ./display/signin.php");
else
	header("location: ./display/index.php");
?>