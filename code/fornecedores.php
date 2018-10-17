<?php
@include '../connections/Connection.php';
@include '../get/variaveis.php';

$sqlFuncionario = "SELECT `idFornecedor`,`nomeFornecedor` FROM `tblempresas`";
	$resultFuncionario = mysqli_query($con, $sqlFuncionario);
	
    $dataAtual  = date("Y-m-d");		
 
// Gravando dados da guia na Base de Dados
if(isset($_POST['fornece']))
{   //$soma                           = "000";
    //$soma                           .= $_POST['soma'];
    $dataFornecimento               = $_POST['data'];
	$nuitFuncionario				= $_POST['nuit'];
	$funcionario    				= $_POST['nomeFornecedor'];
    $descricaoProduto         = $_POST['descricao'];
	$valorProduto			= $_POST['valor'];
	    
    //$idFuncionario		                  = $_POST['nomeFuncionario'];
    //$soma                           = substr($soma, -3);
    
    @$stmtGM ="INSERT INTO `tblfornecedores`(`nuit`,`nomeFornecedor`,`descricaoFornecedor`,`valorFornecedor`)"
                . "VALUES('$nuitFuncionario','$funcionario','$descricaoProduto','$valorProduto')";
   
	@$stmtG=mysqli_query($con,$stmtGM);
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {
		@header("location:../display/fornecedores.php");
    }
}
?>
<div style="padding-left: 30px;margin-top:0px">
    <form action="fornecedores.php" method="post" id="desconto" name="desconto" >
        <br/>
        <div class="row box-body">
        <div class="col-md-7">
                <div class="form-group col-md-9">
            <label for="nomeFornecedor">Nome do Fornecedor</label>
            <select name="nomeFornecedor" id="nomeFornecedor" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
                <option selected="selected" value=""></option>
				<?php while($rowFuncionario = mysqli_fetch_assoc($resultFuncionario))
			  {?>
				<option value="<?=$rowFuncionario['idFornecedor']?>"><?=$rowFuncionario['nomeFornecedor']?></option>
		<?php }?>
            </select>
        </div>
		<div class="form-group col-md-1">
		<br><br>
                            <button type="" class="btn btn-sm btn-default grey-200">Adicionar</button>
                          </div>
						  <div class="form-group col-md-6">
		<label for="nuit">Nuit</label>
		<input  class="form-control inputText" id="nuit" name="nuit" required >		
		</div>
		
		<div class="form-group col-md-9">
                    <label for="descricao">Descricao do Produto</label>
                    <!--<select id="descricao" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" name="descricao">-->
					<input  class="form-control inputText" id="nuit" name="descricao" required >	
                        <option value=""></option>
								<option value=""></option>
                    <!--</select>-->
                </div>
				<div class="form-group col-md-1">
		<br><br>
                            <a class="btn btn-sm btn-default grey-200" href="novoFornecedor.php">Adicionar</a>
                          </div>
				 <div class="form-group col-md-6">
                    <label for="valor" >Valor</label>
                    <input id="valor" class="form-control inputText" type="number" onkeyup="subtotal();" name="valor" min="0" required>
                </div>
				
       </div>
      </div>
    </form>
    <div style="margin-left:15px" class="form-group-btn">
        <button class="btn btn-sm btn-fw red" onclick="location.reload()"><i class="glyphicon glyphicon-erase"></i>Limpar</button>
<button form="desconto" class="btn btn-sm btn-fw blue-900" type="submit" name="fornece"><i class="glyphicon glyphicon-save"></i>Salvar</button>
    </div><br><br>
</div>