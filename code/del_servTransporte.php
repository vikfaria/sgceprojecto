<?php
include '../include/cabecalho.php';
include '../Connections/connection.php';
include "../classes/Historico.php";

$idF = $_GET['id'];

if(isset($idF))
{
    
		
	$sql ="DELETE FROM `tbladerencia` WHERE `id_aderencia` = '$idF'";
   
	 $result = mysqli_query($con, $sql);
	 $last_id = mysqli_insert_id($con);	
	 $tabela = 'tbladerencia';
				
	if(!$result)
    {
        echo "<label class='erro'>Erro ao Eliminar</label>".mysqli_error($con);
    }
    else
    {   $historico = new Historico();
        $historico ->setTipo('3');
		$historico ->setUsuario($_SESSION['idUserFluxo']);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Eliminar Serviço de Transporte');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
             window.location.href = "../display/ps_servicoTransporte.php";
		     alert("Serviço de Transporte excluido com sucesso!");
             </script>';

    } 
  }

include'../include/rodape.php';
?>


