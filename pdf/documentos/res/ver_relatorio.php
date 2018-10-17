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
	
	$titulo = 'Resultado da Pesquisa';
	$tipoId = $_GET['id'];
	$dataMin = $_GET['dataMin'];
	$dataMax = $_GET['dataMax'];
	$estado = $_GET['estado'];
	$sqlAdd = '';
	$valorT = 0;
	
	
	//Verificacao do conteudo a Imprimir (Titulo)
	if(empty($tipoId) && empty($dataMin) && empty($dataMax) && empty($estado))
		$titulo .= " Geral do Relatório";
	
	if($tipoId == 1)
		$titulo .= " do Tipo <b>Realista </b>";
	else if($tipoId == 3)
		$titulo .= " do Tipo <b>Pessimista </b>";
	else if($tipoId == 4)
		$titulo .= " do Tipo <b>Optimista </b>";
	
	if($dataMin != '' || $dataMax != '')
		$titulo .= " da Data: <b>".date("d-m-Y", strtotime($dataMin))." : ".date("d-m-Y", strtotime($dataMax))."</b>";
	if($estado != '')
	{
		if($estado == 1 )
			$estadoN = " <b>Aprovado</b>";
		else
			$estadoN = " <b>Não Executado</b>";
		
		$titulo .=" do Estado:<b>".$estadoN."</b>";
	}
	
	include("cabecalho.php");?>
    <br>
<?php
$addSql = '';
$class = '';
$count = 0;
$conta = 2;

if($tipoId != '')
{
	$addSql = "AND `idTipo`='$tipoId'";
	$sqlAdd .= " AND `idTipo`='$tipoId'";
}
if($estado != '')
{
	$addSql .= " AND `estado`='$estado'";
	$sqlAdd .= " AND `estado`='$estado'";
}
if($dataMax  != '' && $dataMin != '') 	//Se forem introduzidos os valores max e min
	$addSql .= " AND (`tblfluxo`.`dataPrevista` BETWEEN '$dataMin' AND '$dataMax')";
else if($dataMax  == '' && $dataMin != '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` >= '$dataMin')";
else if($dataMax  != '' && $dataMin == '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` <= '$dataMax')";

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

$sqlEmp = "SELECT * FROM `tblfluxo`, tblempresas where tblfluxo.idempresa=tblempresas.idempresa ".$addSql." ORDER BY `dataPrevista` ASC";
$resultEmp = mysqli_query($con, $sqlEmp);

@$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=2 ".$addSql;
$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$totalSaidas=$result['Total'];

@$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=1 ".$addSql;

$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$totalEntradas=$result['Total'];

$saldo =0;
?>
	<br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
  <tr>
	<td style="width:10%;" class='midnight-blue'>Data</td>
	<td style="width:15%;" class='midnight-blue'>Empresa</td>
	<td style="width:30%;" class='midnight-blue'>Descricao(Entrada/Saida)</td>
	<td style="width:13%; text-align: center;" class='midnight-blue'>Entrada</td>
	<td style="width:13%; text-align: center;" class='midnight-blue'>Saida</td>
	<td style="width:14%; text-align: center;" class='midnight-blue'>Saldo</td>
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
		<td style="text-align: right;"><?=number_format($valorT,2)?></td>
	</tr>
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
			<td><?=date("d-m-Y", strtotime($linha['dataPrevista']))?></td>
			<td style="width:10%;"><?=$linha['nomeFornecedor'];?></td>
			<td style="width:30%;"><?=$linha['descricaofluxo']?></td>
			<td align='right'>
			<?php 
				if($linha['idTipoFluxo']=='1' || $linha['idTipoFluxo']=='0' )
				{
					echo number_format($linha['valorPrevisto'],2);
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
					echo number_format(0,2);
			
			?></td>
			<td align='right'>
			
			<?php 
				if($linha['idTipoFluxo']=='2')
				{
					echo number_format($linha['valorPrevisto'],2);
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
					echo number_format(0,2);
			?></td>

			<td align='right'><?=number_format($saldo,2); ?></td>
		</tr>
<?php
	$conta ++;
	$count ++;
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

