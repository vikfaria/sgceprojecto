<?php
include'../include/cabecalho.php';
?>
<!-- ############ PAGE START-->
<div class="padding">
  <div class="box">
    <div class="box-header">
	  <h2> Alunos</h2>
	  
      <small>Listagem de Alunos</small>
    </div>
	<br>
	<div class="form-group">
<?php
	include '../code/listar_alunos_educadora.php';
?>
	</div>
  </div>
</div>
<!-- ############ PAGE END-->
<?php
include'../include/rodape.php';
?>