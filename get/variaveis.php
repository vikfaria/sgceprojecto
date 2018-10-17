<?php
session_start();
//variaveis de inicio da seccao

$usuarioId = $_SESSION['id'];
$usuarioNome = $_SESSION['userNome'];
$usuarioSenha = $_SESSION['userSenha']; 			 
$usuarioAvatar = $_SESSION['avatar'];
$usuNivelAcesso = $_SESSION['nivelAcesso'];
$nome = $_SESSION['nome'];
$UsuarioApelido = $_SESSION['apelido'];
$UsuarioSexo = $_SESSION['sexo'];
$UsuarioEmail = $_SESSION['email'];
$UsuarioEstado = $_SESSION['estado'];

?>
