<?php 

$sqlTipo = "SELECT * FROM `tblfluxo`, `paramtipos` WHERE `paramtipos`.`idTipo` LIKE `tblfluxo`.`idTipo` AND `tblfluxo`.`idTipoFluxo`=1 ORDER BY `tblfluxo`.`idfluxo` DESC";
$resultTipo = mysqli_query($con, $sqlTipo);

@$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo` WHERE `tblfluxo`.`idTipoFluxo`=1";
    $stmtTotal=mysqli_query($con, $sqlTotal);
	$result=mysqli_fetch_assoc($stmtTotal);
	$total=$result['Total'];
?>
<table name="tabela" id="tabela" st-table="rowCollectionBasic" class="table m-b-none">
      <thead>
      <tr>
		<th st-sort="lastName" style="width: 15%">Nome do fornecedor</th>
        <th st-sort="lastName" style="width: 28%">Descri&ccedil;&atilde;o</th>
		<th st-sort="lastName">Data de previs&atilde;o</th>
		<th st-sort="lastName">Previs&atilde;o</th>
		<th st-sort="birthDate">Tipo</th>
		<th>Estado</th>
		<td align="center" st-sort="birthDate"><b>Acções<b></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
     foreach ($resultTipo as $linha)
     {
		 $Butao = '';
		 $idEmpresa = $linha['idEmpresa'];
		
		$sqlEmpresa = "SELECT * FROM `tblempresas` WHERE idEmpresa='".$idEmpresa."'";
		 $stmtEmpresa=mysqli_query($con, $sqlEmpresa);
		$resultEmpresa=mysqli_fetch_assoc($stmtEmpresa);
		$tipoFluxo=$linha['idTipo'];
		$cor = '';
		if($tipoFluxo == 1)
			$cor = "label yellow-800";
		else if($tipoFluxo == 3)
			$cor = "label red-800";
		else if($tipoFluxo == 4)
			$cor = "label green-800";


		if($linha['estado']==0){
			$estado = 'N&atilde;o Executado';
			$Butao = '';
		}else{
			$estado = 'Executado';
			$Butao = 'disabled';
		}
?>
  <tr>	
		<td name="nomeFuncionario" id="nomeFuncionario" class="ng-binding"><?=$resultEmpresa['nomeFornecedor'];?></td>
		<td name="nomeFuncionario" id="nomeFuncionario" class="ng-binding"><?=$linha['descricaofluxo'];?></td>
		<td name="nomeAgregado" id="nomeAgregado" class="ng-binding"><?=date("d-m-Y", strtotime($linha['dataPrevista']))?></td>
		<td name="nomeAgregado" id="nomeAgregado" class="ng-binding" align="right"><?=number_format($linha['valorPrevisto'], 2,",",".")?></td>
		<td name="unidadeSaude" id="unidadeSaude" class="ng-binding"><label class="<?=$cor?>"><?=$linha['tipo'];?></label></td>
		<td><?=$estado?></td>

		<td align="center">

		<a href="../display/editarEntradas.php?id=<?=$linha['idfluxo']?>"><button type="button" class="btn btn-sm btn-sm "  data-toggle="tooltip" title="Editar" <?=$Butao?> <?=$disableButons?>><i class="glyphicon glyphicon-edit"></i></button></a>
		<a href="../display/executarEntradas.php?id=<?=$linha['idfluxo']?>"><button class="btn btn-sm btn-sm blue-700" data-toggle="tooltip" title="Executar" <?=$Butao?> <?=$disableButons?>><i class="glyphicon glyphicon-check"></i></button></a>
		<a><button class="btn btn-sm btn-sm red-700" data-toggle="modal" data-target="#modal<?php echo $linha['idfluxo'];?>" data-toggle="tooltip" title="Excluir" <?=$Butao?> <?=$disableButons?>><i class="glyphicon glyphicon-remove"></i></button></a>

		</td>
	</tr>
	<!-- .modal -->
	<div id="modal<?php echo $linha['idfluxo'];?>" class="modal fade animate black-overlay" data-backdrop="false">
	  <div class="row-col h-v">
		<div class="row-cell v-m">
		  <div class="modal-dialog modal-sm">
			<div class="modal-content flip-y">
			  <div class="modal-body text-center">          
				<p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
				<p>Desculpe, pretendes "<b>excluir</b>" este intem ?</p>
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn white p-x-md" data-dismiss="modal">Não</button>
				<a type="button" onClick='window.location="../code/deleteEntrada.php?id=<?=$linha['idfluxo'];?>"' class="btn btn-danger p-x-md" data-dismiss="modal">Sim</a>
			  </div>
			</div><!-- /.modal-content -->
		  </div>
		</div>
	  </div>
	</div>
	<!-- / .modal -->
<?php
     }
?>   
<tr class="box blue-50">
<th st-sort="lastName">Valor Total:</th>
<td name="unidadeSaude" id="unidadeSaude" class="ng-binding " colspan="3" align="right"><b><?=number_format($total, 2,",",".")?></b></td></tr>                    
     </tbody>
</table>