<?php 
	require_once '../Connections/connection.php';
	
	$sql="SELECT * FROM `tbladerencia`,`tblaluno`,`tblzona`,`tblpercurso`,`tblcarinha`,`tbleducadora`,`tblmotorista`,`tblrotas`
				WHERE `tbladerencia`.`id_aluno` like `tblaluno`.`id_aluno`
				AND `tbladerencia`.`id_zona` like `tblzona`.`id_zona` 
				AND `tbladerencia`.`id_percurso` like `tblpercurso`.`id_percurso` 
				AND `tbladerencia`.`id_carrinha` like `tblcarinha`.`id_carrinha`
				AND `tbladerencia`.`id_educadora` like `tbleducadora`.`id_educadora` 
				AND `tbladerencia`.`id_motorista` like `tblmotorista`.`id_motorista`
				AND `tbladerencia`.`id_rota` like `tblrotas`.`id_rota`";
	$yy=mysqli_query($con, $sql);
	
?>


<form id="formulario" action ="../display/rg_actualizarservicoTransporte.php"  method="post">
<div class="row"  align="left">	
<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Aluno</label>
		<select name="aluno" id="aluno" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			  
<?php
			foreach ($yy as $linha)
			{
			  $id_aderencia = $linha['id_aderencia'];	
			  $nome_aluno = $linha['nome_aluno'];
              echo "<option value='$id_aderencia'>$nome_aluno</option>";
			  
			}
?> 
		</select>
		 
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Zona</label>
		<select name="zona" id="zona" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			 
<?php
			foreach ($yy as $linha)
			{
			  $id_aderencia = $linha['id_aderencia'];	
			  $nome_zona = $linha['nome_zona'];
              echo "<option value='$id_aderencia'>$nome_zona</option>";
			  
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Percurso</label>
		<select name="percurso" id="percurso" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			
<?php
			foreach ($yy as $linha)
			{
			  $id_aderencia = $linha['id_aderencia'];	
			  $nome_percurso = $linha['nome_percurso'];
              echo "<option value='$id_aderencia'>$nome_percurso</option>";
			  
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Carrinha</label>
		<select name="carrinha" id="carrinha" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			 
<?php
			foreach ($yy as $linha)
			{
			  $id_aderencia = $linha['id_aderencia'];	
			  $matricula = $linha['matricula'];
              echo "<option value='$id_aderencia'>$matricula</option>";
			  
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Educadora</label>
		<select name="educadora" id="educadora" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			 
<?php
			foreach ($yy as $linha)
			{
			  $id_aderencia = $linha['id_aderencia'];	
			  $nome_educadora = $linha['nome_educadora'];
              echo "<option value='$id_aderencia'>$nome_educadora</option>";
			  
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Motorista</label>
		<select name="motorista" id="motorista" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			 
<?php
			foreach ($yy as $linha)
			{
			  $id_aderencia = $linha['id_aderencia'];	
			  $nome_motorista = $linha['nome_motorista'];
              echo "<option value='$id_aderencia'>$nome_motorista</option>";
			  
			}
?> 
		</select>
</div>

<div class="form-group col-md-6" >
	  <label style="padding-left:10px">Rota</label>
		<select name="rota" id="rota" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
			 
<?php
			foreach ($yy as $linha)
			{
			  $id_aderencia = $linha['id_aderencia'];	
			  $nome_rota = $linha['nome_rota'];
              echo "<option value='$id_aderencia'>$nome_rota</option>";
			  
			}
?> 
		</select>
</div>


 </div>
  
 </div>
      <div class="modal-footer">
       <button type="button" class="btn dark-white p-x-md" data-dismiss="modal">Cancelar</button> 
		<button type="submit" name = "subServiTrans" id = "subServiTrans"   class="btn danger p-x-md blue-900">Confirmar</button>
      </div>
 
</form>