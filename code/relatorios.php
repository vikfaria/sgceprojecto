<?php 
$sqlEmp = "SELECT * FROM `tblfluxo`, tblempresas where tblfluxo.idempresa=tblempresas.idempresa ORDER BY dataPrevista ASC";
$resultEmp = mysqli_query($con, $sqlEmp);

	@$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=2";
    $stmtTotal=mysqli_query($con, $sqlTotal);
	$result=mysqli_fetch_assoc($stmtTotal);
	$totalSaidas=$result['Total'];
	
	@$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=1";
    $stmtTotal=mysqli_query($con, $sqlTotal);
	$result=mysqli_fetch_assoc($stmtTotal);
	$totalEntradas=$result['Total'];

?>
	<table name="tabela" id="tabela" class="table m-b-none">
      <thead>
      <tr>
        <th st-sort="lastName">Data</th>
		<th st-sort="lastName">Empresa</th>
		<th st-sort="lastName">Descrição(Entrada/Saída)</th>
		<th st-sort="lastName" style="text-align: center">Entrada</th>
        <th st-sort="birthDate" style="text-align: center">Saída</th>
		<th st-sort="birthDate" style="text-align: center">Saldo</th>
      </tr>
      </thead>
	  <tbody class="tableBody">
<?php 
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

			<td align='right'><?=number_format($saldo,2,",","."); ?></td>
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
					$saldo = $linha['valorPrevisto']+ $saldo;
				}
				else 
					echo number_format(0,2,",",".");
			?></td>
			<td align='right'>
			
			<?php 
				if($linha['idTipoFluxo']=='2')
				{
					echo number_format($linha['valorPrevisto'],2,",",".");
					$saldo = $saldo-$linha['valorPrevisto'];
				}
				else 
					echo number_format(0,2,",",".");
			?></td>

			<td align='right'><?=number_format($saldo,2,",","."); ?></td>
		</tr>
<?php
	}
?>
<tr class="box blue-50">
<th st-sort="lastName">Valor Total:</th>
<td colspan="3" align="right" ><b><?=number_format($totalEntradas,2,",",".");?></td><td name="unidadeSaude" id="unidadeSaude" class="ng-binding" colspan="1" align="right"><b><?=number_format($totalSaidas,2,",",".");?></b></td></tr>
</tbody>
	</table>