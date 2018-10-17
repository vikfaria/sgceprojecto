
<?php 
require_once '../Connections/connection.php';
include ("../Classes/classes.php");

   
    $sql="SELECT * FROM `tbladerencia`,`tblmotorista`,`tblaluno`,`tblencarregado`,`tblusuario` WHERE `tbladerencia`.`id_motorista` LIKE `tblmotorista`.`id_motorista` AND `tbladerencia`.`id_aluno` LIKE `tblaluno`.`id_aluno` AND `tblaluno`.`id_encarregado` LIKE `tblencarregado`.`id_encarregado` AND `tblencarregado`.`usuarioId` LIKE `tblusuario`.`usuarioId` AND `tblusuario`.`usuarioId`= '$usuarioId'";
    $stmt=mysqli_query($con, $sql);
  
    
  
$aux = new classes();



    
		
		
		
?>


<br>
</br>


<div id="dataMotoritas" class="modal fade" data-backdrop = "false">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
					 <br>
					 <br>
                     <h4 class="modal-title">Detalhes do Motorista do Seu Filho</h4>  
                </div>  
                <div class="modal-body" id="motorista_detail">  
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
      <tr>
	  
	  
	  
        <th >Nome Filho</th>
		<th >Foto Motorista</th>
		<th >Nome Motorista</th>
        <th >Apelido</th>
		<th >Carta Condução</th>
		<th data-hide="phone,tablet">Cell</th>
		<th data-hide="phone,tablet">Email</th>
		<th >Morada</th>
		
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha = mysqli_fetch_assoc($stmt))
     {
	$id_aluno = $linha['id_aluno'];	
	$id_motorista = $linha['id_motorista'];
    $nome_motorista = $linha['nome_motorista'];
    $apelido_motorista = $linha['apelido_motorista'];
	$carta_motorista = $linha['carta_motorista'];
    $contacto_motorista = $linha['contacto_motorista'];
    $email_motorista = $linha['email_motorista'];
    $id_zona = $linha['id_zona'];
	$foto_motorista = $linha['foto_motorista'];
	$morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
	$al = $aux->getRow("tblaluno", "nome_aluno", "id_aluno", $id_aluno);
	?>


  <tr>
  <td style="font-weight:bold"><?=$al?></td>
  <td><div style=
   "border: solid 0 #060; border-left-width:2px; padding-left:0.5ex">
    <?=$foto_motorista?></div></td>
	<td ><?=$nome_motorista?></td>
	<td ><?=$apelido_motorista?></td>
	<td ><?=$carta_motorista?></td>
	<td ><?=$contacto_motorista?></td>  
	<td ><?=$email_motorista?></td> 
	<td ><?=$morada?></td>
   	


  <td align="center">
	<div class =" btn-group">
  <input type="button" name="view" value="Ver" id="<?php echo $linha["id_motorista"]; ?>" class="btn btn-info btn-xs view_motorista" />
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
	 
