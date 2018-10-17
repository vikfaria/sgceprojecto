<?php
include'../Connections/connection.php';

if(isset($_POST['registar']))
{   
	$data               = date('d-m-Y');
    $nomeBanco               = $_POST['nomeBanco'];
	$numeroDaConta		= $_POST['numeroDaConta'];
	$saldoInicial = $_POST['saldoInicial'];
	
		
    @$stmtGM ="INSERT INTO `tblbanco`(`data`,`nomeBanco`,`numeroDaConta`,`saldoInicial`,`saldoActual`)"
                . "VALUES('$data','$nomeBanco','$numeroDaConta','$saldoInicial','$saldoInicial')";
   
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

<form action="../code/banco.php" method="post" name="form1" id="form1">
 
  <div class="row box-body" style="padding-left: 5%;">
	<div class="col-md-7" align="left">
		<div class="form-group">
		  <td nowrap="nowrap" align="right">Nome do banco</td>
		  <input type="text" class="form-control" name="nomeBanco" value="" size="32" required/>
		</div>
		<div class="row">
			<div class="form-group col-md-6 col-xs-6">
			  <label for="">Número da conta</label>
			  <input type="text" class="form-control" name="numeroDaConta" value="" size="32" required/>
			</div>
			<div class="form-group col-md-6 col-xs-6">
			  <label for="">Saldo inicial  </label>
			  <input type="text" class="form-control" name="saldoInicial" value="" size="32" required/>
			</div>
		</div>
		<div>
		  <button type="submit" class="btn btn-info"  name="registar" value="" style="float: right;">Adicionar</button>
		</div>
	</div>
   </div>

  <input type="hidden" name="MM_insert" value="form1" /><br>
</form>