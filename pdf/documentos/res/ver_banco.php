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
	$titulo = "Listagem dos Bancos";
	include("cabecalho.php");
	
	$sql="SELECT * FROM `tblbanco`";
	$stmt=mysqli_query($con, $sql);
	
	$count = 0;

?>
	<br><br>
<div align="center">
	<table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
	  <tr >
		<th style="width:20%; text-align: center" class='midnight-blue'>Nome do Banco</th>
		<th style="width:20%; text-align: center" class='midnight-blue'>Numero da Conta</th>
		<th style="width:20%; text-align: center" class='midnight-blue'>Saldo Inicial</th>
		<th style="width:20%; text-align: center" class='midnight-blue'>Saldo Actual</th>
	  </tr>
	<?php
	 foreach ($stmt as $linha)
	 {
		if($count%2==0)
			$class="silver";
		else
			$class="clouds";
		?>
			<tr class="<?php echo $class;?>">
				<td ><?=$linha['nomeBanco'];?></td>
				<td align="center"><?=$linha['numeroDaConta'];?></td>
				<td align="right"><?= number_format($linha['saldoInicial'],2);?></td>
				<td align="right"><?= number_format($linha['saldoActual'],2);?></td>    
			</tr>
	<?php
	$count ++;
		}
	?>
	</table>
</div>
<br> <br>
	
</page>

