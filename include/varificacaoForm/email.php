<?php
require_once ('../../Connections/connection.php');
include_once("../../classes/cadastro_utilizadores.php");

$idU = $_POST['idU'];
$email = $_POST['email'];
$sql = "SELECT `UsuarioEmail` FROM `tblusuario` WHERE `UsuarioEmail` LIKE '$email' AND `usuarioId` !='$idU'";
$result = mysqli_query($con, $sql);
echo mysqli_num_rows($result);