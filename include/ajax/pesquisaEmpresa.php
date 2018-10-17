<?php
include '../../connections/Connection.php';

$tipoFornecedor = $_POST['tipoF'];
$tipoCliente = $_POST['tipoC'];
$detalhes = $_POST['descricao'];
$addSql = " `idEmpresa`!=0 ";

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

if($detalhes != '' || $tipoFornecedor=='true' || $tipoCliente == 'true')
	$where = " WHERE ";
else if($tipoFornecedor=='false' || $tipoCliente == 'false')
	$where = " WHERE ";

	
if($detalhes == '' && $tipoCliente == 'false' && $tipoFornecedor == 'false')
{
$sql="SELECT * FROM `tblempresas`";

$stmt=mysqli_query($con, $sql);
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
		 
?>
  <tr>				
	<td ><?=$linha['nomeFornecedor'];?></td>
	<td ><?=$linha['descricaoFornecedor'];?></td>
	<td ><?=$linha['data'];?></td>
	<td ><?=$tipo?></td>
	<td><a href="../display/editarEmpresa.php?id=<?=$linha['idEmpresa']?>"><button type="button" class="btn btn-sm btn-sm " data-toggle="tooltip" title="Editar"><i class="glyphicon glyphicon-edit"></i></button></a></td>	
 </tr>
<?php
 }
}
else
{
$sql="SELECT * FROM `tblempresas`".$where.$addSql."";
$stmt=mysqli_query($con, $sql);
	
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
		 
?>
  <tr>				
	<td style="width: 200px;"><?=$linha['nomeFornecedor'];?></td>
	<td style="width: 250px;"><?=$linha['descricaoFornecedor'];?></td>
	<td ><?=$linha['data'];?></td>
	<td ><?=$tipo?></td>     
	<td><a href="../display/editarEmpresa.php?id=<?=$linha['idEmpresa']?>"><button type="button" class="btn btn-sm btn-sm " data-toggle="tooltip" title="Editar"><i class="glyphicon glyphicon-edit"></i></button></a></td>	
 </tr>
<?php
 }
}
?>