<?php

	$saidaId="";
	$data="";
	$valorPrevisto='';
	$sqlBanco = "SELECT idBanco, nomeBanco, numeroDaConta FROM `tblbanco`";
	$resultBanco = mysqli_query($con, $sqlBanco);

if(isset($_GET['id']))
{
    $saidaId = $_GET['id'];	
	$data=date('Y-m-d');
	$sql = "SELECT `valorPrevisto`,`descricaofluxo`,`nomeFornecedor` FROM `tblfluxo`,`tblempresas`  WHERE `tblfluxo`.`idEmpresa` LIKE `tblempresas`.`idEmpresa` AND `idfluxo`='$saidaId'";
	$result = mysqli_query($con, $sql);
	$rowResult = mysqli_fetch_assoc($result);
	$valorPrevisto = $rowResult['valorPrevisto'];
	$descricaofluxo = $rowResult['descricaofluxo'];
	$nomeFornecedor = $rowResult['nomeFornecedor'];
}
// Gravando dados da guia na Base de Dados ;
if(isset($_POST['saida']))
{   
	$saldoActual=0;
	$data=date('Y-m-d');
	$valorExecutado =$_POST['valorExecutado'];
    $saidaId = $_GET['id'];	
	$bancoId=$_POST['nomeBanco'];
	
	$saldoAct=explode("." , $_POST['saldoActual']);
	for($i=0;$i<count($saldoAct);$i++)
	{
		$saldoActual .= $saldoAct[$i];
	}
    $stmtGM ="UPDATE `tblfluxo` SET `valorExecutado`='$valorExecutado',`dataExecucao` = '$data', `idBanco`='$bancoId', `estado`='1' WHERE `tblfluxo`.`idfluxo` = '".$saidaId = $_GET['id']."'";
   
	$stmtG=mysqli_query($con,$stmtGM);
	
	$stmtBanco ="UPDATE `tblbanco` SET `saldoActual`='$saldoActual',`data` = '$data' WHERE `tblbanco`.`idBanco` = '".$bancoId."'";
 
	$stmtB=mysqli_query($con,$stmtBanco);
	
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {
		echo '
		<script language="JavaScript"> 
				window.location="../display/listarSaidas.php"; 
		</script>';
    }
}
?>
<form action="executarSaidas.php?id=<?=$saidaId?>" method="post" name="form1" id="form1">
  
  <div class="box">

  <div class="row box-body">
   <div class="col-md-7">
   <div class="row">
		<div class="col-md-12">
		   <div class="form-group">
				<label>Nome da Empresa:</label>
				<input type="text" value="<?=$nomeFornecedor?>" readonly name="empresa" class="form-control" />
		   </div>
		</div>
		<div class="col-md-12">
		   <div class="form-group">
				<label>Descrição:</label>
				<input type="text" value="<?=$descricaofluxo?>" readonly name="descricao" class="form-control" />
		   </div>
		</div>
		<div class="col-md-6">
		   <div class="form-group">
				<label>Data:</label>
				<input type="text" value="<?=$data?>" readonly name="data" class="form-control" />
		   </div>
		</div>
		<div class="col-md-6">
		   <div class="form-group">
				<label>Valor Previsto:</label>
				<input type="text" style="text-align: right" value="<?=number_format($valorPrevisto,2,",",".")?>" readonly name="valorPrevisto" class="form-control" />
				<input type="hidden" id="leva" value="<?=$valorPrevisto?>"/>
		   </div>
		</div>
	</div>
   <div class="form-group">
            <input type="hidden" name="idEntrada" value="" size="32" />
            <label for="nomeBanco" style="width: 100%;">Nome do Banco</label>
            <div class="col-md-12" style="padding: 0 2% 0 0;">
      		  <select name="nomeBanco" id="nomeBanco" class="form-control nomeBancoSaida" ui-jp="select2" ui-options="{theme: 'bootstrap'}" style="width: 100%; " required>
                      <option selected="selected" value=""></option>
      				        <?php while($rowBanco = mysqli_fetch_assoc($resultBanco)){
						$bancoId = $rowBanco['idBanco'];
						?>
                      <option value="<?=$bancoId?>"><?=$rowBanco['nomeBanco']." - ". $rowBanco['numeroDaConta']?></option>      		    
                       <?php }?>
              </select>
             </div>
    </div>
		<div class="row">
		   <div class="form-group col-md-12 col-xs-12">
				<label>Valor da Execução:</label>
				<input type="text" name="valorExecutado" id="saldoExecucaoEntrada" min="0" value="<?=$valorPrevisto?>" size="32" required  class="form-control execucaoentrada numberFormat" readonly />
		   </div>
		 <div id="saldo">
		   <div class="form-group col-md-6 col-xs-6">
				<label>Saldo Antes da Execução:</label>
				<div>
					<input type="number" value="" id="saldoSaida" value="" size="32" readonly  class="form-control numberFormat" />
				</div>
		   </div>
		   <div class="form-group col-md-6 col-xs-6">
				<label>Saldo Ap&oacute;s Execução:</label>
				<input type="text" style="text-align:right" name="saldoActual" id="saldoActualEntrada" value="" size="32" readonly  class="form-control" />
		   </div>
		 </div>
		</div>
   
    <div class="form-group">
        <button type="submit" class="btn btn-info" name="saida" id="executar" >Executar</button>
    </div>
    </div>
   </div> 
   </div>
  
</form>