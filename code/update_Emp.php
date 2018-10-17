<?php
if(isset($_POST['submit'])){
    $updateInfo = new Empresa();
    if($updateInfo->update()){
        echo '
		<div class="alert alert-success alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		Inserido Com Sucesso.
		</div>
		';
    }else{
        echo '
		<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
		Falha na Insercão.
		</div>
		';
    }
	echo '<script>
		window.location="./update_Emp.php";
	</script>';
}
?>