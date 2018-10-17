<?php
include '../include/cabecalho.php';
include '../Connections/connection.php';
include "../classes/Historico.php";

if(isset($_GET['id']))
{
    $idF = $_GET['id'];
		
	@$stmtGM ="DELETE FROM `tblaluno` WHERE `id_aluno` = '$idF'";
   
	 $result = mysqli_query($con, $stmtGM);
	 $last_id = mysqli_insert_id($con);	
	 $tabela = 'tblaluno';
				
	if(!$result)
    {
        echo "<label class='erro'>Erro ao Eliminar</label>".mysqli_error($con);
    }
    else
    {   $historico = new Historico();
        $historico ->setTipo('3');
		$historico ->setUsuario($_SESSION['idUserFluxo']);
		$historico ->setDataHora(date('Y/m/d H:i:s'));
		$historico ->setDescricao('Eliminar Aluno');
		$historico ->setTabela($tabela);
		$historico ->setCampoAlterado($last_id);
		$historico ->novoHistorico();
		
        echo'	<script type="text/javascript">
             window.location.href = "../display/ps_aluno.php";
		     alert("Aluno excluido com sucesso!");
             </script>';

    } 
  }

include'../include/rodape.php';
?>


