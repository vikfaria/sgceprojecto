<?php

  //LOGOUT

session_start();

if($_SESSION['idUserFluxo']){
unset($_SESSION['idUserFluxo']);
unset($_SESSION['activoFluxo']);
}
header("location: ../index.php");
?>