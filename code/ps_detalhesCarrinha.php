
<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");

 
   //$sql1="SELECT * FROM `tblcarinha`, `tblusuario` WHERE  `tblusuario`.`usuarioId` = '$usuarioId'";
   
   $sql="SELECT * FROM `tbladerencia`,`tblcarinha`,`tblaluno`,`tblencarregado`,`tblusuario` WHERE `tbladerencia`.`id_carrinha` LIKE `tblcarinha`.`id_carrinha` AND `tbladerencia`.`id_aluno` LIKE `tblaluno`.`id_aluno` AND `tblaluno`.`id_encarregado` LIKE `tblencarregado`.`id_encarregado` AND `tblencarregado`.`usuarioId` LIKE `tblusuario`.`usuarioId` AND `tblusuario`.`usuarioId`=  '$usuarioId'";
    $stmt=mysqli_query($con, $sql);
  

$sql2="SELECT * FROM `tbltipocarinha`";
$a=mysqli_query($con, $sql2);

$sql3="SELECT * FROM `tblmotorista`";
$b=mysqli_query($con, $sql3);

$sql4="SELECT * FROM `tbleducadora`";
$c=mysqli_query($con, $sql4);

$aux = new classes();
$foto ="";
$tipo_cari ="";
$lot = "";
$matri ="";
$cont = "";
$moto = "";
$educa = "";

?>

<br>
</br>

<div id="dataModal" class="modal fade" data-backdrop = "false">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
					 <br>
					 <br>
                     <h4 class="modal-title">Detalhes da Carrinha do Seu Filho</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-blue-900" data-dismiss="modal">Fechar</button>  
                </div>  
           </div>  
      </div>  
 </div>  

<!-- .modal -->
	
<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
	    <th>Nome Filho</th>
        <th>Foto Carrinha</th>
		<th>Modelo Carrinha</th>
		<th>Lotação</th>
		<th>Matricula</th>
		<th>Contacto</th>
		<th>Motorista</th>
		<th>Educadora</th>
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
	  
	  
      </thead>
      <tbody class="tableBody" >
<?php
 foreach($stmt as $linha)
   {
	$id_aluno = $linha['id_aluno'];	   
	$id_carrinha = $linha['id_carrinha'];	 
    $matricula = $linha['matricula'];
    $lotacao = $linha['lotacao'];
    $id_tipo_carinha = $linha['id_tipo_carinha'];
    $contacto = $linha['contacto'];
    $id_motorista = $linha['id_motorista'];
    $id_educadora = $linha['id_educadora'];
    $foto = $linha['foto'];
	$tipo_carinha = $aux->getRow("tbltipocarinha", "nome_tipo_carinha", "id_tipo_carinha", $id_tipo_carinha);
	$motorista = $aux->getRow("tblmotorista", "nome_motorista", "id_motorista", $id_motorista);
	$educadora = $aux->getRow("tbleducadora", "nome_educadora", "id_educadora", $id_educadora);
	$al = $aux->getRow("tblaluno", "nome_aluno", "id_aluno", $id_aluno);

?>


  <tr>
    <td style="font-weight:bold"><?=$al?></td>
  <td><div style=
   "border: solid 0 #060; border-left-width:2px; padding-left:0.5ex">
    <?=$foto?></div></td>
	<td ><?=$tipo_carinha?></td>
	<td ><?=$lotacao?></td>
	<td ><?=$matricula?></td> 
	<td ><?=$contacto?></td> 
	<td ><?=$motorista?></td>
    <td ><?=$educadora?></td>
   	


  <td align="center">
	<div class =" btn-group">
  <input type="button" name="view" value="Ver" id="<?php echo $linha["id_carrinha"]; ?>" class="btn btn-info btn-xs view_data" />
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
	 
