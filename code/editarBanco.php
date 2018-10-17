<?php
include'../Connections/connection.php';

if(isset($_POST['banco']))
{  
	$bancoId=$_POST['bancoId'];
    $nomeBanco               = $_POST['nomeBanco'];
	$numeroDaConta		= $_POST['numeroDaConta'];
	$saldoInicial = $_POST['saldoInicial'];
	
		
    @$stmtGM ="UPDATE `tblbanco` SET `nomeBanco`='$nomeBanco',`numeroDaConta`='$numeroDaConta',`saldoInicial`='$saldoInicial' WHERE `idBanco`='$bancoId'";   
	@$stmtG=mysqli_query($con,$stmtGM);
		
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
		
    }
    else
    {
        echo '
		<script language="JavaScript"> 
				window.location="../display/listarBanco.php"; 
		</script>';
    }
}?>