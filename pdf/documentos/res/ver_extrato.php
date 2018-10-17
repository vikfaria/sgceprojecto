<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
.info{
	background:#bbdefb;
	padding: 3px 5px 3px 5px;
	margin: 3px 5px 3px 5px;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="font-size:9pt;text-align:right;font-weight:bold">
                    &copy; Copyright <strong>Academia, Consultoria e Servi&ccedil;os Universo, E.I.</strong> <?php echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
	<?php
	
$tipoId = $_GET['id'];
$dataMin = $_GET['dataMin'];
$dataMax = $_GET['dataMax'];
$banco = $_GET['banco'];
$addSql = '';
$sqlAdd = " AND `tblfluxo`.`idBanco`='$banco'";
$valorT = 0;
$count = 0;
$saldo =0;
$titulo = 'Resultado da Pesquisa';

	
	//Verificacao do conteudo a Imprimir (Titulo)
	if(empty($tipoId) && empty($dataMin) && empty($dataMax))
		$titulo .= " Geral do Relatório";
	
	if($tipoId == 1)
		$titulo .= " do Tipo <b>Realista </b>";
	else if($tipoId == 3)
		$titulo .= " do Tipo <b>Pessimista </b>";
	else if($tipoId == 4)
		$titulo .= " do Tipo <b>Optimista </b>";
	
	if($dataMin != '' || $dataMax != '')
		$titulo .= " da Data: <b>".date("d-m-Y", strtotime($dataMin))." : ".date("d-m-Y", strtotime($dataMax))."</b>";

// Cabecalho
	include("cabecalho.php");

	
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
	<br><br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
  <tr>
	<td style="width:13%;" class='midnight-blue'>Data</td>
	<td style="width:13%;" class='midnight-blue'>Empresa</td>
	<td style="width:35%;" class='midnight-blue'>Descricao(Entrada/Saida)</td>
	<td style="width:11%; text-align: center;" class='midnight-blue'>Entrada</td>
	<td style="width:11%; text-align: center;" class='midnight-blue'>Saida</td>
	<td style="width:11%; text-align: center;" class='midnight-blue'>Saldo</td>
  </tr>
	<tr class="info">
		<td> ---- </td>
		<td> Caixa </td>
		<td> SALDO INICIAL </td>
		<td style="text-align: right;">
		<?php 
			echo number_format($saldo,2);
		?></td>
		<td style="text-align: right;">
		<?php
		?></td>
			<td align='right'><?php 
			$saldo = $valorT + $valorB;
			echo number_format($saldo,2); ?></td>	</tr>
<?php
while ($linha=mysqli_fetch_assoc($resultEmp))
     {
		 if($count%2==0)
			$class="silver";
		else
			$class="clouds";
		
		 $tipoFluxo=$linha['idTipoFluxo'];
	?>
		<tr class="<?php echo $class;?>">
			<td><?=$linha['dataExecucao'];?></td>
			<td><?=$linha['nomeFornecedor'];?></td>
			<td><?=$linha['descricaofluxo']?></td>
			<td align='right'>
			<?php 
				if($linha['idTipoFluxo']=='1' || $linha['idTipoFluxo']=='0' )
				{
					echo number_format($linha['valorExecutado'],2);
					$saldo = $linha['valorExecutado']+ $saldo;
				}
				else 
					echo number_format(0,2);
			?></td>
			<td align='right'>
			
			<?php 
				if($linha['idTipoFluxo']=='2')
				{
					echo number_format($linha['valorExecutado'],2);
					$saldo = $saldo-$linha['valorExecutado'];
				}
				else 
					echo number_format(0,2);
			?></td>

			<td align='right'><?=number_format($saldo,2); ?></td>
		</tr>
<?php
	}
?>
<tr >
	<th >Valor Total:</th>
	<td colspan="3" align="right" ><b><?=number_format($totalEntradas,2);?></b></td>
	<td class="ng-binding" colspan="1" align="right"><b><?=number_format($totalSaidas,2);?></b></td>
</tr>

</table>
<br> <br>
	
</page>

