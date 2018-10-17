<?php
include '../../connections/Connection.php';

$dataMin = $_POST['dataMin'];
$dataMax = $_POST['dataMax'];
$detalhes = $_POST['descricao'];
$tipo = $_POST['tipo'];
$estado = $_POST['estado'];

$addSql = '';

if($dataMax  != '' && $dataMin != '') 	//Se forem introduzidos os valores max e min
	$addSql .= " AND (`tblfluxo`.`dataPrevista` BETWEEN '$dataMin' AND '$dataMax')";
else if($dataMax  == '' && $dataMin != '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` >= '$dataMin')";
else if($dataMax  != '' && $dataMin == '')
	$addSql .= " AND (`tblfluxo`.`dataPrevista` <= '$dataMax')";

if($estado != '')
	$addSql .= " AND `tblfluxo`.`estado` = '$estado'";
if($detalhes != '')
	$addSql .= " AND `tblfluxo`.`idEmpresa`='$detalhes'";
if($tipo != '')
	$addSql .= " AND `tblfluxo`.`idTipo`='$tipo'";

//Consulta
$sql="SELECT * FROM `tblfluxo`, `paramtipos`, `tblempresas` WHERE `paramtipos`.`idTipo` LIKE `tblfluxo`.`idTipo` AND `tblfluxo`.`idEmpresa` LIKE `tblempresas`.`idEmpresa` ".$addSql." AND `tblfluxo`.`idTipoFluxo`=2 ORDER BY `tblfluxo`.`descricaofluxo` DESC";
$stmt=mysqli_query($con, $sql);

//Calculo do Total 
@$sqlTotal="SELECT SUM(valorPrevisto) as Total FROM `tblfluxo`, `paramtipos`, `tblempresas` WHERE `paramtipos`.`idTipo` LIKE `tblfluxo`.`idTipo` AND `tblfluxo`.`idEmpresa` LIKE `tblempresas`.`idEmpresa` AND `tblfluxo`.`idTipoFluxo`=2 ".$addSql;
$stmtTotal=mysqli_query($con, $sqlTotal);
$result=mysqli_fetch_assoc($stmtTotal);
$total=$result['Total'];
 foreach ($stmt as $linha)
 {
	 $Butao = '';
	 $tipoFluxo=$linha['idTipo'];
		$cor = '';
		if($tipoFluxo == 1)
			$cor = "label yellow-800";
		else if($tipoFluxo == 3)
			$cor = "label red-800";
		else if($tipoFluxo == 4)
			$cor = "label green-800";
		
	if($linha['estado']==0){
		$estado = 'Não Executado';
		$Butao = '';
	}else{
		$estado = 'Executado';
		$Butao = 'disabled';
	}
?>
<tr>				
	<td name="nomeFuncionario" id="nomeFuncionario" class="ng-binding"><?=$linha['nomeFornecedor'];?></td>
	<td name="nomeFuncionario" id="nomeFuncionario" class="ng-binding"><?=$linha['descricaofluxo'];?></td>
	<td name="nomeAgregado" id="nomeAgregado" class="ng-binding"><?=date("d-m-Y", strtotime($linha['dataPrevista']))?></td>
	<td name="nomeAgregado" id="nomeAgregado" class="ng-binding" align="right"><?=number_format($linha['valorPrevisto'], 2,",",".")?></td>
	<td name="unidadeSaude" id="unidadeSaude" class="ng-binding"><label class="<?=$cor?>"><?=$linha['tipo'];?></label></td>
	<td  class="ng-binding"><?=$estado?></td>
	<td>
		<a href="../display/editarSaidas.php?id=<?=$linha['idfluxo']?>"><button type="button" class="btn btn-sm btn-sm "  data-toggle="tooltip" title="Editar" <?=$Butao?>><i class="glyphicon glyphicon-edit"></i></button>
		</a>
		<a href="../display/executarEntradas.php?id=<?=$linha['idfluxo']?>"><button class="btn btn-sm btn-sm blue-700" <?=$Butao?> data-toggle="tooltip" title="Executar"><i class="glyphicon glyphicon-check"></i></button></a>       
		<a><button class="btn btn-sm btn-sm red-700" <?=$Butao?> data-toggle="modal" data-target="#modal<?php echo $linha['idfluxo'];?>" data-toggle="tooltip" title="Excluir"><i class="glyphicon glyphicon-remove"></i></button></a>
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
				<a type="button" onClick='window.location="../code/deleteSaida.php?id=<?=$linha['idfluxo'];?>"' class="btn btn-danger p-x-md" data-dismiss="modal">Sim</a>
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
<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip({ trigger: "hover" });
});
</script>