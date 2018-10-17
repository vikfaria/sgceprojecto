<?php
include "../classes/Historico.php";
include '../connections/Connection.php';



  if(isset($_POST['subEncarregado'])){
	 
	$id_encarregado = $_POST['encarregado'];
    $nome_encarregado = $_POST['nome'];
	$apelido_encarregado = $_POST['apelido'];
	$contacto_encarregado = $_POST['cell'];
    $email_encarregado = $_POST['email'];
	$id_zona = $_POST['morada'];
	$foto = $_POST['foto'];
	$tabela =  'tblencarregado';
	 
	$sql = "UPDATE `tblencarregado` SET `nome_encarregado`='$nome_encarregado',`apelido_encarregado`='$apelido_encarregado',`contacto_encarregado`='$contacto_encarregado',`email_encarregado`='$email_encarregado',`id_zona`='$id_zona',`foto`= '$foto' WHERE  `id_encarregado`= '$id_encarregado'"; 


	 
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
		$historico ->setDescricao('Actualizar Encarregado');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        
		echo'	<script type="text/javascript">
                     location.reload();
                  alert("Encarregado Actualizado Com Sucesso!");
          window.location.href = "../display/ps_encarregado.php";
		  </script>';
    }

	 
	 
  }
  
  
  
?>