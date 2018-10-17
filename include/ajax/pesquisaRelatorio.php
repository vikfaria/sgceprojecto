<?php 
include '../../connections/Connection.php';

$tipoId = $_POST['id'];
$dataMin = $_POST['dataMin'];
$dataMax = $_POST['dataMax'];
$estado = $_POST['estado'];
$sqlAdd = '';
$addSql = '';
$valorT = 0;
$conta = 2;

if($dataMax  != '' && $dataMin != '') 	//Se forem introduzidos os valores max e min
	$addSql .= " AND (`tblfluxo`.`dataPrevista` BETWEEN '$dataMin' AND '$dataMax')";
else if($dataMax  == '' && $dataMin != '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` >= '$dataMin')";
else if($dataMax  != '' && $dataMin == '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` <= '$dataMax')";

//Pesquisa por estado de Execucao
if($estado != '')
{
	$addSql .= " AND `estado`='$estado'";
	$sqlAdd .= " AND `estado`='$estado'";
}

//Pesquisa por Tipo
if($tipoId != '')
{
	$addSql .= " AND `idTipo`='$tipoId'";
	$sqlAdd .= " AND `idTipo`='$tipoId'";
}

//Pesquisa do Saldo Actual
if($dataMin != '')
{
	$conta = 1;
	$sqlDataE = "SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=1 AND (`tblfluxo`.`dataPrevista` < '$dataMin') ".$sqlAdd;
	$sqlDataS = "SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=2 AND (`tblfluxo`.`dataPrevista` < '$dataMin') ".$sqlAdd;
	$ResultDataE = mysqli_query($con, $sqlDataE);
	$ResultDataS = mysqli_query($con, $sqlDataS);
	
	$RowDataE = mysqli_fetch_assoc($ResultDataE);
	$RowDataS = mysqli_fetch_assoc($ResultDataS);
	
	$valorE = $RowDataE['Total'];
	$valorS = $RowDataS['Total'];
	$valorT = $valorE - $valorS;
}

$sqlEmp = "SELECT * FROM `tblfluxo`, tblempresas where tblfluxo.idempresa=tblempresas.idempresa ".$addSql." ORDER BY dataPrevista ASC";
$resultEmp = mysqli_query($con, $sqlEmp);

$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=2 ".$addSql;
$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$totalSaidas=$result['Total'];

$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=1 ".$addSql;

$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$totalEntradas=$result['Total'];

$saldo =0;
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

			<td align='right'><?=number_format($valorT,2,",",".")?></td>
		</tr>
<?php
while ($linha=mysqli_fetch_assoc($resultEmp))
     {
		 $tipoFluxo=$linha['idTipoFluxo'];
	?>
		<tr>
			<td><?=date("d-m-Y", strtotime($linha['dataPrevista']))?></td>
			<td><?=$linha['nomeFornecedor'];?></td>
			<td style="width: 35%"><?=$linha['descricaofluxo']?></td>
			<td align='right'>
			<?php 
				if($linha['idTipoFluxo']=='1' || $linha['idTipoFluxo']=='0' )
				{
					echo number_format($linha['valorPrevisto'],2,",",".");
					if($conta == 1)
					{
						$saldo = $linha['valorPrevisto'] + $valorT;
					}
					else
					{
						$saldo = $linha['valorPrevisto'] + $saldo;
					}
				}
				else
					echo number_format(0,2,",",".");
			
			?></td>
			<td align='right'>
			
			<?php 
				if($linha['idTipoFluxo']=='2')
				{
					echo number_format($linha['valorPrevisto'],2,",",".");
					if($conta == 1)
					{
						$saldo = $valorT-$linha['valorPrevisto'];
					}
					else
					{
						$saldo = $saldo-$linha['valorPrevisto'];
					}
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