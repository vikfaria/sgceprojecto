<?php 
require_once ('../../Connections/connection.php');
include_once("../../classes/cadastro_utilizadores.php");
$cadastro = new cadastroUtilizador();

if(isset($_POST["actualizar"]))
{
    $nome = stripcslashes($_POST['nome']);
	$usuId = $_POST['idU'];
    $apelido = stripcslashes($_POST['apelido']);
    $email = stripcslashes($_POST['email']);
	
	if(@$_POST['cargo'])
		$cargo = $_POST['cargo'];
	else
		$cargo = 0;
	
    $sexo = $_POST['sexo'];
	
		if($_FILES['FotoCadastro']['name'] != '')
		{
			$foto = $_FILES['FotoCadastro'];
			if($cadastro->VerificaErroImg($foto))
			{
				preg_match("/\.(pjpeg|jpeg|png|gif|bmp|jpg){1}$/i", $foto['name'], $ext); //Pega extencao
				//gera um nome unico para imagem
				$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

				//caminho onde ficara a imagem
				$caminho_imagem = "../../assets/images/usuarios/".$nome_imagem;

				//faz o upload da imagem para o caminho
				if(move_uploaded_file($foto['tmp_name'], $caminho_imagem))
					$foto = $nome_imagem;
				else
					$foto = $_POST['fotoU'];
			}
			else
				$foto = $_POST['fotoU'];
		}
		else
			$foto = $_POST['fotoU'];
		$sql = "UPDATE `tblusuario` SET `nome`='$nome', `UsuarioApelido`='$apelido', `UsuarioEmail`='$email', `usuNivelAcesso`='$cargo', `UsuarioSexo`='$sexo', `usuarioAvatar`='$foto' WHERE `usuarioId` = '$usuId'";
		
		$result = mysqli_query($con, $sql);

		echo "<script>window.location='../ps_usuarios.php'</script>";
	
}
?>