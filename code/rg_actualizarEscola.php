<?php
include "../classes/Historico.php";
include '../connections/Connection.php';

  if(isset($_POST['subEscola'])){
	 
	$id_escola = $_POST['escola'];
	$nome_escola = $_POST['nome'];  
    $contacto_escola = $_POST['cell'];
    $id_zona = $_POST['morada'];
	$tabela =  'tblescola';
	 
	$sql = "UPDATE `tblescola` SET `nome_escola`='$nome_escola',`contacto_escola`='$contacto_escola',`id_zona`='$id_zona' WHERE  `id_escola`='$id_escola'"; 


	 
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
		$historico ->setDescricao('Actualizar Escola');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
                     location.reload();
                  alert("Escola Actualizado Com Sucesso!");
          window.location.href = "../display/ps_escola.php";
		  </script>';
    } 
  }
?>