<?php
include'../include/cabecalho.php';
?>
<!-- ############ PAGE START-->
<div class="padding">
  <div class="box">
    <div class="box-header">
	  <h2 >Usuarios</h2>
	  
      <small>Cadastro de Alunos</small>
    </div>
	<div class="table-responsive">
<?php
	include '../code/ps_listarPresencas.php';
?>
	</div>
  </div>
</div>
<!-- ############ PAGE END-->

<!--Modal->
<?php
include'../include/rodape.php';
?>