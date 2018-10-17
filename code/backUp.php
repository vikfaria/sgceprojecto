<?php 
$sqlEntradaM = "SELECT MIN(idEntrada) as minimo, MAX(idEntrada) as maximo FROM `tblentradas`";
$sqlSaidaM = "SELECT MIN(idSaida) as minimo, MAX(idSaida) as maximo FROM `tblsaidas`";
$resultEntradaM = mysqli_query($con, $sqlEntradaM);
$resultSaidaM = mysqli_query($con, $sqlSaidaM);
$rowEntradasM = mysqli_fetch_assoc($resultEntradaM);
$rowSaidasM = mysqli_fetch_assoc($resultSaidaM);

$minS = $rowSaidasM['minimo'];
$minE = $rowEntradasM['minimo'];
$maxS = $rowSaidasM['maximo'];
$maxE = $rowEntradasM['maximo'];
$min=0;
$max=0;

if($minS >= $minE){
	$min  = $minE;
}
else{
	$min=$minS;
}
if($maxS <= $maxE){
	$max = $maxE;
}
else{
	$max=$maxS;
}
?>
	<table name="tabela" id="tabela" st-table="rowCollectionBasic" ui-jp="footable" data-filter="#filter" data-page-size="10" class="table m-b-none">
      <thead>
      <tr>
        <th st-sort="lastName">Data</th>
		<th st-sort="lastName">Empresa</th>
		<th st-sort="lastName">Descricao(Entrada/Saida)</th>
		<th st-sort="lastName">Entrada</th>
        <th st-sort="birthDate">Saida</th>
		<th st-sort="birthDate">Saldo</th>
      </tr>
      </thead>
	  <tbody class="tableBody">
<?php
for($i=$min; $i<=$max; $i++){
	$sqlEntrada = "SELECT *, DAY(STR_TO_DATE(dataPrevista, '%Y-%m-%d')) AS data FROM `tblentradas` AS data WHERE idEntrada='$i'";
	$sqlSaida = "SELECT *, DAY(STR_TO_DATE(dataPrevista, '%Y-%m-%d')) AS data FROM `tblsaidas` WHERE idSaida='$i'";
	$resultEntrada = mysqli_query($con, $sqlEntrada);
	$resultSaida = mysqli_query($con, $sqlSaida);
	
	if($resultEntrada || $resultSaida)
	{
		$idEmpresa = 0;
		$numEntradas = mysqli_num_rows($resultEntrada);
		$numSaidas = mysqli_num_rows($resultSaida);
		$rowEntrada = mysqli_fetch_assoc($resultEntrada);
		$rowSaidas = mysqli_fetch_assoc($resultSaida);
		
		if($numEntradas != 0 && $numSaidas !=0)
			$idEmpresa = $rowEntrada['idEmpresa'];
		else if($numEntradas == 0 && $numSaidas != 0)
			$idEmpresa = $rowSaidas['idEmpresa'];
		else if($numSaidas == 0 && $numEntradas != 0)
			$idEmpresa = $rowEntrada['idEmpresa'];
		
		
		$sqlEmpresa = "SELECT * FROM `tblempresas` WHERE idEmpresa='".$idEmpresa."'";
		$resultEmpresa = mysqli_query($con, $sqlEmpresa);
		$rowEmpresa = mysqli_fetch_assoc($resultEmpresa);
	?>
		<tr>
			<td><?=$rowEntrada['data']."/".$rowSaidas['data']?></td>
			<td><?=$rowEmpresa['nomeFornecedor']?></td>
			<td><?=$rowEntrada['descricaoEntrada']."/".$rowSaidas['descricaoSaida']?></td>
			<td><?=$rowEntrada['valorPrevisto']?></td>
			<td><?=$rowSaidas['valorPrevisto']?></td>
			<td>Saldo</td>
		</tr>
<?php
	}
}
?>
		</tbody>
	</table>
<?php	
?>
