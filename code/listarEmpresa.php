<?php 
$sql="SELECT * FROM `tblempresas`";
$stmt=mysqli_query($con, $sql);
?>
<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left">
      <thead >
      <tr >
        <th >Nome</th>
		<th >Descrição</th>
        <th >Data</th>
		<th >Tipo de Empresa</th>
		<th style="text-align: center">Acções</th>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
     while($linha = mysqli_fetch_assoc($stmt))
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
	<td style="width: 350px;"><?=$linha['descricaoFornecedor'];?></td>
	<td ><?=$linha['data'];?></td>
	<td ><?=$tipo?></td>  
<td align="center"><a href="../display/editarEmpresa.php?id=<?=$linha['idEmpresa']?>"><button type="button" class="btn btn-sm " data-toggle="tooltip" title="Editar" <?=$disableButons?>><i class="glyphicon glyphicon-edit"></i></button></a></td>	
 </tr>

<?php
     }
?>
</tbody>
</table>