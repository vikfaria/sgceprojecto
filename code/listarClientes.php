<?php 

@include '../connections/Connection.php';
@include '../get/variaveis.php';

@$sql="SELECT * FROM `tblempresas` WHERE `tblempresas`.`cliente`=1";
    $stmt=mysqli_query($con, $sql);
?><br>
 <div class="col-sm-4">
	  <input placeholder="Pesquisa" class="input-sm form-control ng-isolate-scope" id="filter" type="text"/>
	</div><br><br>
	
<table name="tabela" id="tabela" st-table="rowCollectionBasic" ui-jp="footable" data-filter="#filter" data-page-size="10" class="table m-b-none">
      <thead>
      <tr>
        <th st-sort="lastName">Nome</th>
		<th st-sort="lastName">Descricao</th>
        <th st-sort="birthDate">Data</th>
      </tr>
      </thead>
      <tbody>
<?php
     foreach ($stmt as $linha)
     {
?>
  <tr>				
					<td name="nomeFuncionario" id="nomeFuncionario" class="ng-binding"><?=$linha['nomeFornecedor'];?></td>
					<td name="nomeAgregado" id="nomeAgregado" class="ng-binding"><?=$linha['descricaoFornecedor'];?></td>
                    <td name="unidadeSaude" id="unidadeSaude" class="ng-binding"><?=$linha['data'];?></td>
                    
     </tr>

<?php
     }
?>
      </tbody>
    </table>