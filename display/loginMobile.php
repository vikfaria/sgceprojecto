<?php
require_once '../Connections/connection.php';

 $json = file_get_contents('php://input');
 
 $obj = json_decode($json,true);

 $username =  $obj['username'];
 
 $password =  $obj['password'];
 
 if($obj['username']!="")
 {
	 $result = $mysqli->query("SELECT * FROM tblusuario WHERE usuarioNome = '$username' AND usuarioSenha = '$password'");
	 	
 }else{
	 echo json_encode('Tente Novamente');
 }
   
   
?> 