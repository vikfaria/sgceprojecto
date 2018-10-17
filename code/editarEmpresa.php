<?php 

if(isset($_GET['id']))
{
    $empresaId = $_GET['id'];
$sql="SELECT * FROM `tblempresas` WHERE `idEmpresa`='$empresaId'";
$stmt=mysqli_query($con, $sql);
$resultEmpresa=mysqli_fetch_assoc($stmt);
$cliente = $resultEmpresa['cliente'];
$fornecedor = $resultEmpresa['fornecedor'];
$idEmp = $resultEmpresa['idEmpresa'];
$tipoC = "";
$tipoF = "";
if($cliente != 0)
	$tipoC = "checked";
if($fornecedor != 0)
	$tipoF = "checked";

}
if(isset($_POST['fonecedor']))
{   
	$data               = date('d-m-Y');
    $nuit               = $_POST['nuit'];
	$nomeFornecedor		= $_POST['nomeFornecedor'];
	$descricaoFornecedor = $_POST['descricaoFornecedor'];
	@$cliente			= $_POST['cliente'];
	@$fornecedor			= $_POST['fornecedor'];
	$contacto			= $_POST['contacto'];
	$email				= $_POST['email'];
	
	$empresaId = $_GET['id'];	
    
	
    @$stmtGM ="UPDATE `tblempresas` SET `data`='$data',`nuit`='$nuit',`nomeFornecedor`='$nomeFornecedor',`descricaoFornecedor`='$descricaoFornecedor',"
	."`cliente`='$cliente',`fornecedor`='$fornecedor',`contacto`='$contacto',`email`='$email' WHERE `idEmpresa`='$empresaId' ";
   
	@$stmtG=mysqli_query($con,$stmtGM);
	
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {
		echo '
		<script language="JavaScript"> 
				window.location="../display/listarEmpresas.php"; 
		</script>';
    }
}?>

<form action="editarEmpresa.php?id=<?=$idEmp?>" method="post" name="form1" id="form1">
  
  <div class="modal-header">
      </div>

  <div class="box">
  <div class="row box-body">
  <div class="col-md-7">

      <div class="form-group">
            <label for="">Nome:</label>
            <input type="text" name="nomeFornecedor" value="<?=$resultEmpresa['nomeFornecedor'];?>" class="form-control" required/>
      </div>
      <div class="form-group">
            <label for="">Nuit:</label>
           <input type="text" name="nuit" value="<?=$resultEmpresa['nuit'];?>"  data-toggle="nuit" id="nuit" data-content="Nuit j&aacute; Existe" class="form-control nuit" required/>
		   <input type="hidden" id="idEmp" value="<?=$idEmp?>">
      </div>
      <div class="form-group">
            <label for="">Contacto:</label>
           <input type="text" name="contacto" value="<?=$resultEmpresa['contacto'];?>" class="form-control" required/>
      </div>
      <div class="form-group">
            <label for="">Email:</label>
           <input type="email" name="email" value="<?=$resultEmpresa['email'];?>" class="form-control" size="32" required/>
      </div>
        <div class="form-group">
             <label for="">Descricao:</label>
            <textarea name="descricaoFornecedor" class="form-control" required><?=$resultEmpresa['descricaoFornecedor'];?></textarea>
        </div>
    
        <div class="row col-md-12">
                  
                 
                  <div class="checkbox">
                    <label class="ui-check" style="float: left;">
                      <input type="checkbox" name="cliente" value="1" size="32" <?=$tipoC?>/>
                      <i class="dark-white" style="border: 1px solid #ccc;"></i>
                      Cliente
                    </label>
                  </div>
                  <div class="checkbox" >
                    <label class="ui-check" style="float: left; margin-left: 2%;">
                     <input type="checkbox" name="fornecedor" value="1" size="32" <?=$tipoF?>/>
                      <i class="dark-white" style="border: 1px solid #ccc;"></i>
                      Fornecedor
                    </label>
                  </div>
                 
            </div><!--row-->
        


            <div class="text-center">
                    <input type="submit" class="btn btn-info" id="butao" name="fonecedor" value="Adicionar" />
                   
                  <input type="hidden" name="MM_insert" value="form1" />
            </div>

       </div>
       </div>
       </div>

</form>