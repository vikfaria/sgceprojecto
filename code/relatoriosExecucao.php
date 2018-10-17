<?php 
	$saldo = 0;

?>
	<table name="tabela" id="tabela" class="table m-b-none">
      <thead>
      <tr>
        <th st-sort="lastName">Data</th>
		<th st-sort="lastName">Empresa</th>
		<th style="width:35%;">Descri&ccedil;&atilde;o(Entrada/Sa&iacute;da)</th>
		<th st-sort="lastName">Entrada</th>
        <th st-sort="birthDate">Sa&iacute;da</th>
		<th st-sort="birthDate">Saldo Inicial</th>
      </tr>
      </thead>
	  <tbody class="tableBody">
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
</tbody>
	</table>