<?php 
include '../../connections/Connection.php';
$usuId = $_POST['id'];
$padrao = "1230";
$sql = "UPDATE `tblusuario` SET `usuarioSenha`=md5('$padrao') WHERE `usuarioId` = '$usuId'";
mysqli_query($con, $sql);

?>