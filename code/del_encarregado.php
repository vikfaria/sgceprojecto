<?php
include '../include/cabecalho.php';
include '../Connections/connection.php';
include "../classes/Historico.php";

$idF = $_GET['id'];

if(isset($idF))
{
    
		
	$sql ="DELETE FROM `tblencarregado` WHERE `id_encarregado` = '$idF'";
   
	 $result = mysqli_query($con, $sql);
	 $last_id = mysqli_insert_id($con);	
	 $tabela = 'tblencarregado';
				
	if(!$result)
    {
        echo "<label class='erro'>Erro ao Eliminar</label>".mysqli_error($con);
    }
    else
    {   $historico = new Historico();
        $historico ->setTipo('3');
		$historico ->setUsuario($_SESSION['idUserFluxo']);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Eliminar Encarregado');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
             window.location.href = "../display/ps_encarregado.php";
		     alert("Encarregado excluido com sucesso!");
             </script>';

    } 
  }

include'../include/rodape.php';
?>


