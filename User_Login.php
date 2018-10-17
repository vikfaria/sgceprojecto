<?php
 
// Importing DBConfig.php file.
include 'DBConfig.php';
 
// Creating connection.
 $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
 
 // Getting the received JSON into $json variable.
 $json = file_get_contents('php://input');
 
 // decoding the received JSON and store into $obj variable.
 $obj = json_decode($json,true);
 
// Populate User utilizador from JSON $obj array and store into $utilizador.
$utilizador = $obj['utilizador'];
 
// Populate Password from JSON $obj array and store into $password.
$password = $obj['password'];

//Applying User Login query with utilizador and password match.
$Sql_Query = "SELECT * FROM tblusuario WHERE usuarioNome = '$utilizador' AND usuarioSenha = '$password'";

// Executing SQL Query.
$check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));


if(isset($check)){

 $SuccessLoginMsg = 'Bem Vindo ao Sistema';
 
 // Converting the message into JSON format.
$SuccessLoginJson = json_encode($SuccessLoginMsg);
 
// Echo the message.
 echo $SuccessLoginJson ; 

 }
 
 else{
 
 // If the record inserted successfully then show the message.
$InvalidMSG = 'Nome do utilizador ou password incorrecta' ;
 
// Converting the message into JSON format.
$InvalidMSGJSon = json_encode($InvalidMSG);
 
// Echo the message.
 echo $InvalidMSGJSon ;
 
 }
 
 mysqli_close($con);
?>