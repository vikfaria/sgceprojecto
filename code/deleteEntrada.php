<?php
include '../include/cabecalho.php';

if(isset($_GET['id']))
{
    $fluxoId = $_GET['id'];
		
	@$stmtGM ="DELETE FROM `fluxocaixa`.`tblfluxo` WHERE `tblfluxo`.`idfluxo` = '$fluxoId'";
   
	@$stmtG=mysqli_query($con,$stmtGM);
	
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Enxecu&ccedil;&auml;o</label>".mysqli_error($con);
		exit();
    }
    else
    {
		echo '
		<script language="JavaScript"> 
				window.location="../display/listarEntradas.php"; 
		</script>';
    }
}

include'../include/rodape.php';
?>