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
	$dataMin = $_GET['dataMin'];
	$dataMax = $_GET['dataMax'];
	$detalhes = $_GET['descricao'];
	$tipo = $_GET['tipo'];
	$estado = $_GET['estado'];
	$addSql = '';
	
	//Verificacao do conteudo a Imprimir (Titulo)
	if(empty($tipo) && empty($dataMin) && empty($dataMax) && empty($estado) && empty($detalhes))
		$titulo .= " Geral do Relatório";
	
	if($tipo == 1)
		$titulo .= " do Tipo <b>Realista </b>";
	else if($tipo == 3)
		$titulo .= " do Tipo <b>Pessimista </b>";
	else if($tipo == 4)
		$titulo .= " do Tipo <b>Optimista </b>";
	
	if($detalhes != '')
	{
		$titulo .= " <b>da Empresa</b>";
	}
	
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
$class = '';
$count = 0;
if($dataMax  != '' && $dataMin != '') 	//Se forem introduzidos os valores max e min
	$addSql .= " AND (`tblfluxo`.`dataPrevista` BETWEEN '$dataMin' AND '$dataMax')";
else if($dataMax  == '' && $dataMin != '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` >= '$dataMin')";
else if($dataMax  != '' && $dataMin == '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` <= '$dataMax')";

if($detalhes != '')
	$addSql .= " AND `tblfluxo`.`idEmpresa`='$detalhes'";
if($tipo != '')
	$addSql .= " AND `tblfluxo`.`idTipo`='$tipo'";
if($estado != '')
	$addSql .= " AND `tblfluxo`.`estado`='$estado'";

//Consulta
$sql="SELECT * FROM `tblfluxo`, `paramtipos`, `tblempresas` WHERE `paramtipos`.`idTipo` LIKE `tblfluxo`.`idTipo` AND `tblfluxo`.`idEmpresa` LIKE `tblempresas`.`idEmpresa` ".$addSql." AND `tblfluxo`.`idTipoFluxo`=2 ORDER BY `tblfluxo`.`idfluxo` DESC";
$stmt=mysqli_query($con, $sql);

//Calculo do Total 
@$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo`, `paramtipos`, `tblempresas` WHERE `paramtipos`.`idTipo` LIKE `tblfluxo`.`idTipo` AND `tblfluxo`.`idEmpresa` LIKE `tblempresas`.`idEmpresa` AND `tblfluxo`.`idTipoFluxo`=2 ".$addSql;
$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$total=$result['Total'];

?>
	<br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
  <tr>
	<td style="width:20%;" class='midnight-blue'>Fornecedor</td>
	<td style="width:30%;" class='midnight-blue'>Descri&ccedil;&atilde;o</td>
	<td style="width:13%;" class='midnight-blue' align="center">Data previs&atilde;o</td>
	<td style="width:13%;" class='midnight-blue' align="center">Previs&atilde;o</td>
	<td style="width:11%;" class='midnight-blue' align="center">Tipo</td>
	<td style="width:11%;" class='midnight-blue' align="center">Estado</td>
  </tr>
<?php
 foreach ($stmt as $linha)
 {
	 $tipoFluxo=$linha['idTipo'];
	$cor = '';
	if($tipoFluxo == 1)
		$cor = "yellow-800";
	else if($tipoFluxo == 3)
		$cor = "red-800";
	else if($tipoFluxo == 4)
	$cor = "green-800";

	 if($count%2==0)
		$class="silver";
	else
		$class="clouds";
		
	if($linha['estado'] == 1)
		$estado = 'Executado';
	else
		$estado = 'N&atilde;o Executado';
	?>
		<tr class="<?php echo $class;?>">
			<td style="width:15%;" class="ng-binding"><?=$linha['nomeFornecedor'];?></td>
			<td style="width:30%;" class="ng-binding" ><?=$linha['descricaofluxo'];?></td>
			<td name="nomeAgregado" id="nomeAgregado" class="ng-binding" align="right"><?=date("d-m-Y", strtotime($linha['dataPrevista']))?></td>
			<td name="nomeAgregado" id="nomeAgregado" class="ng-binding" align="right"><?=number_format($linha['valorPrevisto'], 2)?></td>
			<td name="unidadeSaude" id="unidadeSaude" class="ng-binding" align="center"><label class="<?=$cor?>"><?=$linha['tipo'];?></label></td>
			<td align="center"><label class="<?=$cor?>"><?=$estado?></label></td>
		</tr>
<?php
	$count ++;
	}
?>
<tr >
	<th st-sort="lastName">Valor Total:</th>
<td name="unidadeSaude" id="unidadeSaude" class="ng-binding " colspan="3" align="right"><b><?=number_format($total, 2)?></b></td>
</tr>

</table>
<br> <br>
	
</page>

