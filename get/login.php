<?php
//=====================================
	//chamar o formulario de configuracaoes 
	
/*	
	@session_start();
	//classe  de conexao		
	$utilizador = "";
	$password_utilizador = ""; 
	  
	if (isset($_POST['btn_submit']))
	{
	@session_start();
	$_SESSION['user']=stripcslashes($_POST['username']);
	$password_utilizador =stripcslashes($_POST['password']);
	  
	 $utilizador=$_SESSION["user"];
	
	 include("../get/connection/connection.php");
	  
	  $pegaUser ="SELECT * FROM `tblfuncionario` WHERE `funcionarioUsername` ='$username'";
	  $dados =mysqli_query($con,$pegaUser);
	  $result=mysqli_num_rows($dados);
	  

	  //verificar se os dados correspondem a valores da base de dados
	  if($result == 0)
	  { 
		echo'	<script type="text/javascript">
window.location.href = "../display/404.php";
</script>';
	 }
	  else{
		$row = mysqli_fetch_assoc($dados);

			 
		$_SESSION['usuarioId'] = $row['usuarioId'];
		$_SESSION['usuarioNome'] = $row['usuarioNome'];
		$_SESSION['usuarioSenha'] = $row['usuarioSenha']; 			 
		$_SESSION['usuarioAvatar'] = $row['usuarioAvatar'];
		$_SESSION['usuNivelAcesso'] = $row['usuNivelAcesso'];
		$_SESSION['nome'] = $row['nome'];
		$_SESSION['UsuarioApelido'] = $row['UsuarioApelido'];
		$_SESSION['UsuarioSexo'] = $row['UsuarioSexo'];
		$_SESSION['UsuarioEmail'] = $row['UsuarioEmail'];
		$_SESSION['UsuarioEstado'] = $row['UsuarioEstado'];

			 
			 
			echo'	<script type="text/javascript">
window.location.href = "../display/index.php";
</script>';
			 
	  }
	}
?>
<form name="form" action="SGCE/get/login.php" method="post">

						<div class="form-group">
								<label for="usrname"><i class="icon-user"></i> Nome do Usuario:</label>
								<input type="text" class="form-control" id="usrname" name="username" placeholder="" maxlength="50">
							</div>
					  
							<div class="form-group">
								<label for="psw"><i class="icon-eye"></i> Palavra-Passe:</label>
								<input type="password" class="form-control" id="psw" name="password" placeholder="" maxlength="20">
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-primary blue-900 " name="btn_submit"><i class="icon-key"></i> Iniciar</button>
							</div>          
      </form>