
<?php 
$sql="SELECT * FROM `tblusuario` ORDER BY `usuarioId` DESC";
$stmt=mysqli_query($con, $sql);
?>


<div class ="col-md-12">
<button class="btn btn-group-lg blue-900" id="b6" data-toggle="modal" data-target="#newUsuario" ><i class="glyphicon glyphicon-plus"></i> Adicionar Utilizador</button>

<div>
<br>
<br>
<br>


<!-- .modal Inserção Aluno-->
<div id="newUsuario" class="modal fade animate" data-backdrop="false">
  <div class="modal-dialog modal-md">
    <div class="modal-content">
      <div class="modal-header">
	  <br>
	  <br>
      	<h5 class="modal-title">Adicionar Usuarios</h5>
      </div>
      <div class="modal-body text-center p-md">
		<div class="modal-animation"></div>
        
<form id="form" action ="../display/rg_usuario.php" method="POST">

  <div class="row" >
	  <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="nome">
		<label>Name</label>
	  </div>
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="apelido">
		<label>Apelido</label>
	  </div>
	</div>
	
	<div class="row">
	<div class="md-form-group col-md-6">
	  <input type="email" class="md-input" name="email">
	  <label>Email</label>
	</div>
	 <div class="md-form-group col-md-6" >
		<input type="text" class="md-input" name="cargo">
		<label>Cargo</label>
	 </div>
	 </div>
	 
	  <div class="row">
	  <div class="md-form-group col-md-6">
		<input type="text" class="md-input" name="sexo">
		<label>Sexo</label>
	  </div>
	<div class="md-form-group col-md-6" >
	  <input type="text" class="md-input" name="userName" >
	  <label>User Name</label>
	</div>
	</div>
	
	<div class="row">
	  <div class="md-form-group col-md-6"  >
		<input type="password" class="md-input" name="password">
		<label>Password</label>
	  </div>
	  <div class="md-form-group col-md-6"  >
		<input type="password" class="md-input" name="password2">
		<label>Confirmar Password</label>
	  </div>
	</div><!--row-->
		 
 <div class="row" align="center">
	<div align="center" class=" col-md-5">
		<img class="img-rounded" name="alunoFoto" id="dvPreview" src="../assets/images/avatar.png" width="75" height="75">
		 <div class="form-file">
			<input type="file" name="FotoCadastro" value="" id="fileupload">
			<button class="btn white" style="margin-top: 20%;">Mudar Fotografia</button>
			<!--<button class="btn white" style="margin-top: 15%; margin-bottom: 15%;">Escolher Foto</button>-->
	   </div>	 
	</div>
</div>
 <div class="modal-footer">
        <button type="button" class="btn dark-white p-x-sm" data-dismiss="modal">Cancelar</button> 
        <button type="submit" name = "submit" id = "submit"  data-toggle="modal" class="btn danger p-x-sm blue-900">Confirmar</button>
</div>
</div>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div>

<table name="tabela" id="tabela" class="table m-b-none" style="text-align: left" ui-jp="footable" data-filter="#filter" data-page-size="15">
      <thead >
       <tr >
        <th data-toggle="true" >Foto</th>
		<th >Nome</th>
        <th >Apelido</th>
		<th data-hide="phone,tablet">Usu&aacute;rio</th>
		<th data-hide="phone,tablet">Email</th>
		<th >N&iacute;vel</th>
		<td style="text-align: center; width: 150px"></td>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
 

     while($linha = mysqli_fetch_assoc($stmt))
     {
	 $estado = '';
		 $estadPass = '';
		 $usuId = $linha['usuarioId'];
		 $nivel = $linha['usuNivelAcesso'];
		 $estado = $linha['UsuarioEstado'];
		 $nome = $linha['nome'];
		 $apelido = $linha['UsuarioApelido'];
		 $usuario = $linha['usuarioNome'];
		 $email = $linha['UsuarioEmail'];
		 $sexo = $linha['UsuarioSexo'];
		 $avatarU = $linha['usuarioAvatar'];
		 $checkedO = '';
		 $checkedU = '';
		 $checkedSM = '';
		 $checkedSF = '';
		 $pass = $linha['usuarioSenha'];
		 
		 //Verificacao da palavra pass
		 if($pass == md5("1230"))
			 $estadPass = "disabled";
		 //Sexo
		 if($sexo == "M")
			 $checkedSM = "checked";
		 else
			 $checkedSF = "checked";
		 //Nivel de Acesso
		 if($nivel == 0)
			 $nivel = "Administrador";
		 else if($nivel == 1)
		 {
			 $nivel = "Secretaria";
			 $checkedU = "checked";
		 }
		 else if($nivel == 2)
		 {
			 $nivel = "Educadora";
			 $checkedU = "checked";
		 }
		 else if($nivel == 3)
		 {
			 $nivel = "Encaregado";
			 $checkedU = "checked";
		 }
		 if($estado == 1)
			 $estado = 'on';
		 else
			 $estado = 'busy';

?>

  <tr>
	<td ><span class="img-rounded" ><img  width="35" height="35" src="../assets/images/usuarios/<?=$avatarU?>" alt="..."><i class="<?=$estado?> b-white bottom"></i></span></td>
	<td ><?=$nome?></td>
	<td ><?=$apelido?></td>
	<td ><?=$usuario?></td>  
	<td ><?=$email?></td>  
	<td ><?=$nivel?></td> 
 
<td style="text-align: center; width: 150px">
	<a><button value="<?=$usuId?>" id="editarUsu" type="button" class="btn btn-sm editarUsu" data-toggle="modal" data-target="#view-modal" data-toggle="tooltip" title="Editar"><i class="fa fa-edit"></i></button></a>
	<a><button value="<?=$usuId?>" <?=$estadPass?> id="reset" type="button" class="btn btn-sm red-700 reset" data-toggle="modal" data-target="#resetModal" data-toggle="tooltip" title="Reset Senha"><i class="fa fa-eraser"></i></button></a>
</td>
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

<?php 
include "./modal/editarUsu.php";
include './modal/resetPass.php';
?>