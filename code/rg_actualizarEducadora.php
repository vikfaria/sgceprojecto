<?php
include "../classes/Historico.php";
include '../connections/Connection.php';



  if(isset($_POST['subEducadora'])){
	 
	$id_educadora = $_POST['educadora'];
	$nome_educadora = $_POST['nome'];
	$apelido_educadora = $_POST['apelido'];
	$contacto_educadora = $_POST['cell'];
	$email_educadora = $_POST['email'];
	$id_zona = $_POST['morada'];
	$foto = $_POST['foto'];	
	$tabela = 'tbleducadora';
	 
	 
	 $sql = "UPDATE `tbleducadora` SET `nome_educadora`='$nome_educadora',`apelido_educadora`='$apelido_educadora',`contacto_educadora`='$contacto_educadora',`email_educadora`='$email_educadora',`id_zona`='$id_zona',`foto`= '$foto' WHERE  `id_educadora`= '$id_educadora'"; 


	 
	 $result = mysqli_query($con, $sql);
	 $last_id = mysqli_insert_id($con);	
				
	if(!$result)
    {
        echo "<label class='erro'>Erro Na Actualização</label>".mysqli_error($con);
    }
    else
    {   $historico = new Historico();
        $historico ->setTipo('2');
		$historico ->setUsuario($usuarioId);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Actualizar Educadora');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
                     location.reload();
                  alert("Educadora Actualizado Com Sucesso!");
          window.location.href = "../display/ps_educadoras.php";
		  </script>';
    }

	 
	 
  }
  
  
  
?>