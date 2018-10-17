<?php
include "../classes/Historico.php";
include '../connections/Connection.php';

  if(isset($_POST['subMotorista'])){
	 
	$id_motorista = $_POST['motorista'];
    $nome_motorista = $_POST['nome'];
    $apelido_motorista = $_POST['apelido'];
    $contacto_motorista = $_POST['cell'];
    $email_motorista = $_POST['email'];
    $id_zona = $_POST['morada'];
	$foto_motorista = $_POST['foto'];
	$tabela =  'tblmotorista';
	 
	$sql = "UPDATE `tblmotorista` SET `nome_motorista`='$nome_motorista',`apelido_motorista`='$apelido_motorista',`contacto_motorista`='$contacto_motorista',`email_motorista`='$email_motorista',`id_zona`='$id_zona',`foto_motorista`= '$foto_motorista' WHERE  `id_motorista`= '$id_motorista'"; 


	 
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
		$historico ->setDescricao('Actualizar Motorista');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
                     location.reload();
                  alert("Motorista Actualizado Com Sucesso!");
          window.location.href = "../display/ps_motoristas.php";
		  </script>';
    } 
  }
?>