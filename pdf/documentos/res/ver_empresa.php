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
	
	$tipoFornecedor = $_GET['tipoF'];
	$tipoCliente = $_GET['tipoC'];
	$detalhes = $_GET['descricao'];
	$addSql = "";
	$titulo = 'Resultado da Pesquisa';
	
	//Verificacao do conteudo a Imprimir (Titulo)
	if(empty($tipoFornecedor) && empty($tipoCliente) && empty($detalhes))
		$titulo .= " Geral do Relatório";
	
	if($tipoFornecedor != '')
		$titulo .= " do Tipo <b>Fornecedor </b>";
	if($tipoCliente != '')
		$titulo .= " do Tipo <b>Cliente </b>";
	
	if($detalhes != '')
	{
		$titulo .= " <b>da Empresa</b>";
	}
	
	include("cabecalho.php");?>
    <br>
<?php
$class = '';
$count = 0;
if($detalhes != '')
	$addSql .= " AND `idEmpresa`='$detalhes'";
if($tipoFornecedor == 'true' && $tipoCliente == 'true')
	$addSql .= " AND `cliente`=1 AND `fornecedor`=1";
else if($tipoFornecedor == 'true' && $tipoCliente == 'false')
	$addSql .= " AND `cliente`=1 AND `fornecedor`=0";
else if($tipoFornecedor == 'false' && $tipoCliente == 'true')
	$addSql .= " AND `cliente`=0 AND `fornecedor`=1";
else 
	$addSql .= "";

$sql="SELECT * FROM `tblempresas` WHERE `idEmpresa`!=0".$addSql."";

$stmt=mysqli_query($con, $sql);
?>
	<br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
  <tr >
  	<td style="width:20%;" class='midnight-blue'>Nome</td>
	<td style="width:30%;" class='midnight-blue'>Descricao</td>
	<td style="width:13%;" class='midnight-blue' align="center">Data</td>
	<td style="width:20%;" class='midnight-blue' align="center">Tipo de Empresa</td>
  </tr>
<?php
 foreach ($stmt as $linha)
 {
	 $cliente = $linha['cliente'];
	 $fornecedor = $linha['fornecedor'];
	 $tipo = '';
	 if($cliente == 1 && $fornecedor == 1)
		 $tipo = "Cliente/Fronecedor";
	 else if($cliente == 1 && $fornecedor == 0)
		 $tipo = "Cliente";
	 else if($cliente == 0 && $fornecedor == 1)
		 $tipo = "Fornecedor";
	 else 
		 $tipo = "Estado Vazio";
		 
	 if($count%2==0)
		$class="silver";
	else
		$class="clouds";
		
	
	?>
		<tr class="<?php echo $class;?>">
			<td style="width:150px;"><?=$linha['nomeFornecedor'];?></td>
			<td style="width:300px;"><?=$linha['descricaoFornecedor'];?></td>
			<td align="right"><?=$linha['data'];?></td>
			<td align="center"><?=$tipo?></td>     
		</tr>
<?php
	$count ++;
	}
?>
</table>
<br> <br>
	
</page>

