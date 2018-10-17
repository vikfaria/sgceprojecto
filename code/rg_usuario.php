<?php
include '../connections/Connection.php';
  include_once("../classes/cadastro_utilizadores.php");
  $cadastro = new cadastroUtilizador();
  $ErroEmail = '';
  $ErroUserName = '';
  $error = false;
  $nome = '';
  $focoEmail = '';
  $focoUserName = '';
  $focoPassword2 = '';
  $selectedMasc = '';
  $selectedFem = '';
  $selectedGestor = '';
  $selectedFunc = '';
  $selectedAdm = '';
	
  
  if(isset($_POST['submit'])){
    $nome = $_POST['nome'];
    $apelido = $_POST['apelido'];
    $email = $_POST['email'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $cargo = $_POST['cargo'];
    $password2 = $_POST['password2'];
    $sexo = $_POST['sexo'];
    $foto = $_POST['FotoCadastro'];
    
    
    //manda para os dados para classe
    $cadastro -> setNome($nome);
    $cadastro -> setApelido($apelido);
    $cadastro -> setEmail($email);
    $cadastro -> setUserName($userName);
    $cadastro -> setAvatar($foto);
    $cadastro -> setSenha($password);
    $cadastro -> setNivelAcesso($cargo);
    $cadastro -> setSexo($sexo);  
    $cadastro -> IntroduzDadosUtilizadores();

  }
?>
