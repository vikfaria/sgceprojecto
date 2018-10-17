<?php
include '../connections/Connection.php';

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
    
	
    @$stmtGM ="INSERT INTO `tblempresas`(`data`,`nuit`,`nomeFornecedor`,`descricaoFornecedor`,`cliente`,`fornecedor`, `contacto`, `email`)"
                . "VALUES('$data','$nuit','$nomeFornecedor','$descricaoFornecedor','$cliente','$fornecedor','$contacto', '$email')";
   
	@$stmtG=mysqli_query($con,$stmtGM);
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {
		header("location:../display/listarEmpresas.php");
    }
}?>

<form action="../code/empresas.php" method="post" name="form1" id="form1">
 
  <div class="row box-body" style="padding-left: 5%;">
	<div class="col-md-7" align="left">
		<div class="row">
			<div class="form-group col-md-7 col-xs-7">
				
				  <label>Nome</label>
				  <input type="text" class="form-control" name="nomeFornecedor" value="" size="32" required/>
			  
			</div>
		
			<div class="form-group col-md-5 col-xs-5">
			  <label for="">Nuit</label>
			  <input type="text" class="form-control nuit" id="nuit" name="nuit" value="" size="32" data-toggle="nuit" data-content="Nuit j&aacute; Existe" required/>
			</div>
		</div>	
			<div class="form-group">
			  <label for="">Contacto</label>
			  <input type="text" class="form-control" name="contacto" value="" size="32" required/>
			</div>
		
		<div class="form-group">
		  <label for="">Email</label>
		  <input type="email" class="form-control" name="email" value="" size="32" required/>
		</div>
		
		<div class="form-group">
		        <label for="">Descrição</label>
		        <textarea name="descricaoFornecedor" class="form-control" class="form-control" required></textarea>
   		 </div>
		 <div class="row col-md-12">
              <div class="checkbox" >
                <label class="ui-check" style="float: left; margin-left: 2%;">
                 <input type="checkbox" name="cliente" value="1" >
                  <i class="dark-white" style="border: 1px solid #ccc;"></i>
                  Cliente
                </label>
              </div>
              <div class="checkbox">
                <label class="ui-check" style="float: left; margin-left: 2%;">
                  <input type="checkbox" name="fornecedor" value="1" >
                  <i class="dark-white" style="border: 1px solid #ccc;"></i>
                  Fornecedor
                </label>
              </div>
        </div><!--row-->
		<div>
		  <button type="submit" class="btn btn-info"  name="fonecedor" id="butao" value="" style="float: right;">Adicionar</button>
		</div>
	</div>
   </div>

  <input type="hidden" name="MM_insert" value="form1" /><br>
</form>
</label>

