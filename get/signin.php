	<?php
	$utilizador = "";
	$password_utilizador = "";   
	if (isset($_POST['btn_submit']))
	{
	session_start();
	$utilizador =stripcslashes($_POST['username']);
	$password_utilizador =stripcslashes($_POST['password']);
	  
	 $_SESSION['user'] = $utilizador;
	 //$passwordEncriptada = md5($password_utilizador);
	 include '../Connections/connection.php';
	  
	  $pegaUser ="SELECT * FROM tblusuario WHERE usuarioNome = '$utilizador' AND usuarioSenha = '$password_utilizador'";
	  $dados =mysqli_query($con,$pegaUser);
	  $result=mysqli_num_rows($dados);
	  //verificar se os dados correspondem a valores da base de dados
		$row = mysqli_fetch_assoc($dados);  
		$_SESSION['id'] = $row['usuarioId'];
		$_SESSION['userNome'] = $row['usuarioNome'];
		$_SESSION['userSenha'] = $row['usuarioSenha']; 	
        $_SESSION['avatar'] = $row['usuarioAvatar']; 
        $_SESSION['nivelAcesso'] = $row['usuNivelAcesso']; 
        $_SESSION['nome'] = $row['nome']; 
        $_SESSION['apelido'] = $row['UsuarioApelido']; 
        $_SESSION['sexo'] = $row['UsuarioSexo']; 
        $_SESSION['email'] = $row['UsuarioEmail']; 
        $_SESSION['estado'] = $row['UsuarioEstado']; 	
		 

	}		
?>
 <script>
		       
window.location = "../display/index.php";
			  
			  
</script>