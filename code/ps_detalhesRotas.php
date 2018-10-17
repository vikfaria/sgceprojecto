<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");
$sql="SELECT * FROM `tblrotas`";
$stmt=mysqli_query($con, $sql);

$sql1="SELECT * FROM `tbladerencia`,`tblrotas`,`tblaluno`,`tblencarregado`,`tblusuario` 
WHERE `tbladerencia`.`id_rota` LIKE `tblrotas`.`id_rota` 
AND `tbladerencia`.`id_aluno` LIKE `tblaluno`.`id_aluno` 
AND `tblaluno`.`id_encarregado` LIKE `tblencarregado`.`id_encarregado`
AND `tblencarregado`.`usuarioId` LIKE `tblusuario`.`usuarioId`
AND `tblusuario`.`usuarioId`=  '$usuarioId'";

$a=mysqli_query($con, $sql1);

$aux = new classes();
?>
	
<br>
</br>

<div id="dataRota" class="modal fade" data-backdrop = "false">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
					 <br>
					 <br>
                     <h4 class="modal-title">Detalhes da Rota do Seu Filho</h4>  
                </div>  
                <div class="modal-body" id="rota_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-blue-900" data-dismiss="modal">Fechar</button>  
                </div>  
           </div>  
      </div>  
 </div>  


<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
        
		<th>Nome Filho</th>
		<th>Nome Rota</th>
        <th>Origem</th>
		<th>Destino</th>
		<th>Localizacao</th>
		<th>Carrinha</th>		
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha1 = mysqli_fetch_assoc($a))
     {
	$id_aluno = $linha1['id_aluno'];	 
	$nome_rota = $linha1['nome_rota'];
    $origem_rota = $linha1['origem_rota'];
    $destino_rota = $linha1['destino_rota'];
    $localizacao = $linha1['localizacao'];
	$id_carrinha = $linha1['id_carrinha'];	
	$aluno = $aux->getRow("tblaluno", "nome_aluno", "id_aluno", $id_aluno);

?>


  <tr>
    <td style="font-weight:bold"><?=$aluno?></td>
    <td><div style=
    "border: solid 0 #060; border-left-width:2px; padding-left:0.5ex">
    <?=$nome_rota?></div></td>
	<td ><?=$origem_rota?></td> 
	<td ><?=$destino_rota?></td> 
	<td ><?=$localizacao?></td>
	<td ><?=$id_carrinha?></td>
   
  
   <td align="center">
	<div class =" btn-group">
  <input type="button" name="view" value="Ver" id="<?php echo $linha1["id_rota"]; ?>" class="btn btn-info btn-xs view_rota" />
	</div>	

  

<?php
    }
?>
</tbody>
<tfoot class="hide-if-no-paging">
  <tr>
	  <td colspan="5" class="text-center">
		  <ul class="pagination"></ul>
	  </td>
  </tr>
</tfoot>
</table>

