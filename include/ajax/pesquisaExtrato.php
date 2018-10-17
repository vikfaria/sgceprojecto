<?php 
include '../../connections/Connection.php';

$tipoId = $_POST['id'];
$dataMin = $_POST['dataMin'];
$dataMax = $_POST['dataMax'];
$banco = $_POST['banco'];
$addSql = '';
$sqlAdd = '';
$valorT = 0;
$conta = 2;
$saldo =0;

if($dataMax  != '' && $dataMin != '') 	//Se forem introduzidos os valores max e min
	$addSql .= " AND (`tblfluxo`.`dataExecucao` BETWEEN '$dataMin' AND '$dataMax')";
else if($dataMax  == '' && $dataMin != '')
	$addSql .= " AND (`tblfluxo`.`dataExecucao` >= '$dataMin')";
else if($dataMax  != '' && $dataMin == '')
	$addSql .= " AND (`tblfluxo`.`dataExecucao` <= '$dataMax')";

//pesquisa por banco
	$addSql .= " AND `tblfluxo`.`idBanco`='$banco'";
	$sqlAdd .= " AND `tblfluxo`.`idBanco`='$banco'";

//Pesquisa por Tipo
if($tipoId != '')
{
	$addSql .= "AND `idTipo`='$tipoId'";
	$sqlAdd .= " AND `idTipo`='$tipoId'";
}
$sqlEmp = "SELECT * FROM `tblfluxo`, tblempresas, `tblbanco` where tblfluxo.idempresa=tblempresas.idempresa AND `tblfluxo`.`idBanco` LIKE `tblbanco`.`idBanco` AND estado = 1 ".$addSql." ORDER BY `dataExecucao` ASC";
$resultEmp = mysqli_query($con, $sqlEmp);

$sqlTotal="SELECT SUM(valorExecutado) as Total FROM `tblfluxo` WHERE dataExecucao != '' AND `tblfluxo`.`idTipoFluxo`=2 ".$addSql;
$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$totalSaidas=$result['Total'];

$sqlTotal="SELECT SUM(valorExecutado) as Total FROM `tblfluxo` WHERE dataExecucao != '' AND `tblfluxo`.`idTipoFluxo`=1 ".$addSql;

$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$totalEntradas=$result['Total'];

//Levando Saldo inicial do Banco
$sqlBanco = "SELECT `saldoInicial` FROM `tblbanco` WHERE `idBanco`='$banco'";
$resultBanco = mysqli_query($con, $sqlBanco);
$rowBanco = mysqli_fetch_assoc($resultBanco);

$valorB = $rowBanco['saldoInicial'];
////Pesquisa do Saldo Actual
if($dataMin != '')
{
	$conta = 1;
	$sqlDataE = "SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=1 AND (`tblfluxo`.`dataExecucao` < '$dataMin') AND `estado`=1 ".$sqlAdd;
	$sqlDataS = "SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=2 AND (`tblfluxo`.`dataExecucao` < '$dataMin') AND `estado`=1 ".$sqlAdd;
	$ResultDataE = mysqli_query($con, $sqlDataE);
	$ResultDataS = mysqli_query($con, $sqlDataS);
	
	$RowDataE = mysqli_fetch_assoc($ResultDataE);
	$RowDataS = mysqli_fetch_assoc($ResultDataS);
	
	$valorE = $RowDataE['Total'];
	$valorS = $RowDataS['Total'];
	$valorT = $valorE - $valorS;
}
?>
		<tr class="box blue-50">
			<td> ---- </td>
			<td> Caixa </td>
			<td> SALDO INICIAL </td>
			<td align='right'>
			<?php 
					echo number_format($saldo,2,",",".");
			
			?></td>
			<td align='right'>
			
			<?
			?></td>

			<td align='right'><?php 
			$saldo = $valorT + $valorB;
			echo number_format($saldo,2,",","."); ?></td>
		</tr>
<?php
while ($linha=mysqli_fetch_assoc($resultEmp))
     {
		 $tipoFluxo=$linha['idTipoFluxo'];
	?>
		<tr>
			<td><?=date("d-m-Y", strtotime($linha['dataExecucao']))?></td>
			<td><?=$linha['nomeFornecedor'];?></td>
			<td style="width: 35%"><?=$linha['descricaofluxo']?></td>
			<td align='right'>
			<?php 
				if($linha['idTipoFluxo']=='1' || $linha['idTipoFluxo']=='0' )
				{
					echo number_format($linha['valorExecutado'],2,",",".");
					$saldo = $linha['valorExecutado']+ $saldo;
				}
				else 
					echo number_format(0,2,",",".");
			?></td>
			<td align='right'>
			
			<?php 
				if($linha['idTipoFluxo']=='2')
				{
					echo number_format($linha['valorExecutado'],2,",",".");
					$saldo = $saldo-$linha['valorExecutado'];
				}
				else 
					echo number_format(0,2,",",".");
			?></td>

			<td align='right'><?=number_format($saldo,2,",","."); ?></td>
		</tr>
<?php
	$conta ++;
	}
?>
<tr class="box blue-50">
<th st-sort="lastName">Valor Total:</th>
<td colspan="3" align="right" ><b><?=number_format($totalEntradas,2,",",".");?></td><td name="unidadeSaude" id="unidadeSaude" class="ng-binding" colspan="1" align="right"><b><?=number_format($totalSaidas,2,",",".");?></b></td></tr>