<?php 
require_once ('../Connections/connection.php');
require_once ('../get/variaveis.php');
include ("../Classes/classes.php");

$aux = new classes();

// listar todos alunos com presenças marcadas hoje
$data = date('Y-m-d');
$sql = "SELECT * FROM `tblpresenca`,`tblaluno` WHERE `tblpresenca`.`id_aluno` LIKE `tblaluno`.`id_aluno` AND data_presenca = '$data'";
$stmt=mysqli_query($con, $sql);
?>

<br>
	<div class="form-group col-md-6" align = "left">		   
			  <p>
              <label class="md-switch">
                <input type="checkbox" class="calcText" name="presente" id="presente">
                <i class="green"></i>
               Presentes 
              </label>
			  
              <label class="md-switch">
                <input type="checkbox" class="calcText" name="ausente" id="ausente" >
                <i class="green"></i>
               Ausentes
              </label>
          </p>  
		  </div
	
	<div class="form-group col-md-6" align = "right">		   
			  <p>
              <label class="md-switch">
                <input type="radio" class="calcText percurso" name="percurso" id = "percurso" value="1" checked>
                <i class="red"></i>
               Escola-Casa 
              </label>	
			  
              <label class="md-switch">
                <input type="radio"  class="calcText percurso" name="percurso" id = "percurso" value="2">
                <i class="red"></i>
               Casa-Escola
              </label>
          </p>  
	</div>

	<div class="col-sm-4" align = "right">
      <div class="form-group">
          <div class='input-group date' name="data" id="data" ui-jp="datetimepicker" ui-options="{
                icons: {
                  time: 'fa fa-clock-o',
                  date: 'fa fa-calendar',
                  up: 'fa fa-chevron-up',
                  down: 'fa fa-chevron-down',
                  previous: 'fa fa-chevron-left',
                  next: 'fa fa-chevron-right',
                  today: 'fa fa-screenshot',
                  clear: 'fa fa-trash',
                  close: 'fa fa-remove'
                }
              }">
              <input type='text' class="form-control calcText" >
              <span class="input-group-addon">
                  <span class="fa fa-calendar"></span>
              </span>
          </div>
      </div>
</div>


<div class="box-body b-b b-t" >
      <form class="ng-valid ng-dirty ng-valid-parse " style="" > 
		  <div class="form-group pull-in clearfix ">
				<div class="col-sm-4" align = "left" >
					 <select name="nomeA" id="nomeA" class="form-control select2 calcText" ui-jp="select2" ui-options="{theme: 'bootstrap'}">
                <option value="">Pesquisar Aluno</option><br><br>
<?php
                foreach ($stmt as $linha1)
                {
?>
                  <option value="<?=$linha1['id_aluno']?>"><?=$linha1['nome_aluno'];?></option>
					
<?php
                }
?>
<input type="hidden" value="<?=$linha1['id_aluno']?>" name="aluno">
            </select>
				</div>	
</div>
</form>
</div>


 
 
<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
      <tr >
        <th>Foto</th>
		<th>Aluno</th>
        <th >Zona</th>
		<th >Carrinha</th>
		<th>Entrada</th>
		<th>Saida</th>
		<th>Estado</th>
	<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
	  <?php
	   

     foreach ($stmt as $linha1)
   {
	
	$id_presenca = $linha1['id_presenca'];
	$foto = $linha1['foto'];
	$id_aluno = $linha1['id_aluno'];	
    $id_zona = $linha1['id_zona'];
    $id_estadopresenca = $linha1['id_estadopresenca'];
	$id_carrinha = $linha1['id_carrinha'];
    $id_estado = $linha1['id_estado'];
	$id_tpresenca = $linha1['id_tpresenca'];
	$hora_presenca = $linha1['hora_presenca'];
    $aluno = $aux->getRow("tblaluno", "nome_aluno", "id_aluno", $id_aluno);
    $morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
	$estadopresenca = $aux->getRow("tblestadopresenca", "nome_estadopresenca", "id_estadopresenca", $id_estadopresenca);
    $carinha = $aux->getRow("tblcarinha", "matricula", "id_carrinha", $id_carrinha);
?>
  <tr>
    <td ><?=$foto?></td>
	<td ><?=$aluno?></td>
	<td ><?=$morada?></td>
	<td ><?=$carinha?></td>
	<td ><?=$hora_presenca?></td>
    <td ><?=$hora_presenca?></td>
	<td ><?=$estadopresenca?></td>

	</tr>
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

