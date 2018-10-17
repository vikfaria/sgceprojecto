<?php 

@include '../connections/Connection.php';
@include '../get/variaveis.php';


if(isset($_POST['fonecedor']))
{   
	$data               = date('d-m-Y');
    $nuit               = $_POST['nuit'];
	$nomeFornecedor		= $_POST['nomeFornecedor'];
	$descricaoFornecedor = $_POST['descricaoFornecedor'];
	@$cliente			= 1;
	@$fornecedor		= $_POST['fornecedor'];
	$contacto			= $_POST['contacto'];
	$email				= $_POST['email'];
    
	
    @$stmtGM ="INSERT INTO `tblempresas`(`data`,`nuit`,`nomeFornecedor`,`descricaoFornecedor`,`cliente`,`fornecedor`, `contacto`, `email`)"
                . "VALUES('$data','$nuit','$nomeFornecedor','$descricaoFornecedor','$cliente','$fornecedor','$contacto', '$email')";
   
   
	@$stmtG=mysqli_query($con,$stmtGM);
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {
		header("location:../display/entradas.php");
    }
}?>