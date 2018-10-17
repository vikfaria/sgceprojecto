<?php
include '../include/cabecalho.php';
$query = "select * from paramempresa";
$sql = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($sql);
include "../code/update_Emp.php";
?>
<!-- ############ PAGE START-->
<div class="padding">
  <div class="box">
    <div class="box-header">
	  <h2 >Empresa</h2>
	  
      <small>Informa&ccedil;&atilde;o da Empresa</small>
    </div>
	<div class="form-group box-body">
		<div class="logo" align="center">
			<img src="../assets/images/<?php echo $result['empresaLogo'] ?>" width="150px" height="100px">
			<p>Logo da Empresa</p>
		</div>
		<div class="icon" align="center">
			<img src="../assets/images/<?php echo $result['empresaIcon'] ?>" width="70px" height="70px">
			<p>Icon da Empresa</p>
		</div>
			<div class="row">
				<input type="text" name="id" hidden value="<?php echo $result['empresaId']?>">
				<div class="col-12 form-group">
					<label>Nome da Empresa</label>
					<input readonly type="text" class="form-control" value="<?php echo $result['empresaNome'] ?>" name="empresaNome">
				</div>
				<div class="col-6 form-group">
					<label>Endereco da Empresa</label>
					<input readonly type="text" class="form-control" value="<?php echo $result['empresaEndereco'] ?>" name="empresaEndereco">
				</div>
				<div class="col-6 form-group">
					<label>Telfone da Empresa</label>
					<input readonly type="text" class="form-control" value="<?php echo $result['empresaTelefone'] ?>" name="empresaTelefone">
				</div>
				<div class="col-6 form-group">
					<label>Email da Empresa</label>
					<input readonly type="text" class="form-control" value="<?php echo $result['empresaEmail'] ?>" name="empresaEmail">
				</div>
				<div class="col-6 form-group">
					<label>Slogan da Empresa</label>
					<input readonly type="text" class="form-control" value="<?php echo $result['empresaSlogam'] ?>" name="empresaSlogam">
				</div>
			</div>
			<button type="submit" class="btn btn-info save" name="submit" data-toggle="modal" data-target="#myModal">editar</button>
		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Atualisar Dados</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
					  <form action="#" method="post" enctype="multipart/form-data">
						<input type="hidden" name="empresaLogoD" value="<?=$result['empresaLogo']?>">
						<input type="hidden" name="empresaIconD" value="<?=$result['empresaIcon']?>">
						  <div class="row">
							  <input type="text" name="id" hidden value="<?php echo $result['empresaId']?>">
							  <div class="col-12 form-group">
								  <label>Nome da Empresa</label>
								  <input type="text" class="form-control" value="<?php echo $result['empresaNome'] ?>" name="empresaNome">
							  </div>
							  <div class="col-6 form-group">
								  <label>Endereco da Empresa</label>
								  <input type="text" class="form-control" value="<?php echo $result['empresaEndereco'] ?>" name="empresaEndereco">
							  </div>
							  <div class="col-6 form-group">
								  <label>Telfone da Empresa</label>
								  <input type="text" class="form-control" value="<?php echo $result['empresaTelefone'] ?>" name="empresaTelefone">
							  </div>
							  <div class="col-6 form-group">
								  <label>Email da Empresa</label>
								  <input type="text" class="form-control" value="<?php echo $result['empresaEmail'] ?>" name="empresaEmail">
							  </div>
							  <div class="col-6 form-group">
								  <label>Slogan da Empresa</label>
								  <input type="text" class="form-control" value="<?php echo $result['empresaSlogam'] ?>" name="empresaSlogam">
							  </div>
							  <div class="col-12 form-group">
								  <img src="../assets/images/<?php echo $result['empresaLogo'] ?>" width="70px" height="70px">
								  <label>Logo da Empresa</label>
								  <input type="file" class="form-control" value="<?php echo $result['empresaLogo'] ?>" name="empresaLogo">
							  </div>
							  <div class="col-12 form-group">
								  <img src="../assets/images/<?php echo $result['empresaIcon'] ?>" width="70px" height="70px">
								  <label>Icon da Empresa</label>
								  <input type="file" class="form-control" value="<?php echo $result['empresaIcon'] ?>" name="empresaIcon">
							  </div>
						  </div>
						<button type="submit" class="btn btn-info save" name="submit">guardar</button>
					  </form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>
<!-- ############ PAGE END-->
<?php
include'../include/rodape.php';
?>