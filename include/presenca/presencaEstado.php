<?php 
require_once ('../../Connections/connection.php');
require_once ('../../get/variaveis.php');
require_once ('../../classes/classes.php');

	
	$sql= "SELECT * FROM `tbltprenseca`";
	$c=mysqli_query($con, $sql);
	
?>

<form id="formPresenca" action ="../display/ps_presenca_alunos_educadora.php" method="post">	

	<div class="form-group col-md-6" align = "center">
	<label ><h5>Estado</h5></label>
	<br>
	  <p>
              <label class="md-check">
                <input type="radio" name="estado" value="1">
                <i class="green"></i>
                Entrar
              </label>
            
              <label class="md-check">
               <input type="radio" name="estado" value="2">
                <i class="red"></i>
                Descer
              </label>
            </p>		
	</div>
	
	<div class="form-group col-md-6" align = "center">		   
			<label><h5>Tipo de Presença</h5></label>
			<br>
			  <p>
              <label class="md-switch">
                <input type="radio" name="presenca" value="1">
                <i class="green"></i>
                Casa - Carrinha 
              </label>
			  
              <label class="md-switch">
                <input type="radio" name="presenca" value="2">
                <i class="green"></i>
                Carrinha - Escola
              </label>
          </p>  
		  
              <label class="md-switch">
			   <p>
                <input type="radio" name="presenca" value="3">
                <i class="green"></i>
                Escola - Carrinha
              </label>
           
              <label class="md-switch">
                <input type="radio" name="presenca" value="4">
                <i class="green"></i>
                Carrinha - Casa
              </label>
             </p>
	</div>
	</br>
	</br>
	</br>
	</br>
	<br>
	</br>
	

 </div>
</form>