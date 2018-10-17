<?php

$sqlFuncionario = "SELECT `idEmpresa`,`nomeFornecedor` FROM `tblempresas` WHERE `cliente` = 1";
	$resultFuncionario = mysqli_query($con, $sqlFuncionario);
	
	$sqlParamTipo = "SELECT * FROM `paramtipofluxo`";
	$resultParamTipo = mysqli_query($con, $sqlParamTipo);
	$dadosParamTipo=mysqli_fetch_assoc($resultParamTipo);
	
	$tipoFluxo=1;
	
 
// Gravando dados da guia na Base de Dados
if(isset($_POST['entrada']))
{   

    $descricaoEntrada               = $_POST['descricaoEntrada'];
	$valorPrevisto				= $_POST['valorPrevisto'];
	$dataPrevista    			= date("Y-m-d", strtotime($_POST['data']));
	$Tipo			= $_POST['idTipo'];
	$idEmpresa =$_POST['nomeFornecedor'];
    
    @$stmtGM ="INSERT INTO `tblfluxo`(`descricaofluxo`,`valorPrevisto`,`dataPrevista`,`idTipoFluxo`,`idTipo`,`idEmpresa`)"
                . "VALUES('$descricaoEntrada','$valorPrevisto','$dataPrevista','$tipoFluxo','$Tipo','$idEmpresa')";
   
	@$stmtG=mysqli_query($con,$stmtGM);
	if(!$stmtG)
    {
        echo "<label class='erro'>Erro Na Inser&ccedil;&auml;o</label>".mysqli_error($con);
    }
    else
    {
       echo '
		<script language="JavaScript"> 
				window.location="../display/listarEntradas.php"; 
		</script>';
    }
}
?>
<form action="entradas.php" method="post" name="form1" id="form1">
  <div align="box">
    <div class="row box-body" style="padding-left: 5%;">
    	
	  <div class="col-md-7" align="left">
			 <div class="form-group col-md-12" style="padding: 0;">

		 	 <input type="hidden" name="idEntrada" value="" size="32" />
		 	<div class="col-md-10" style="padding: 0 2% 0 0;">
				<label for="nomeFornecedor">Nome do Fornecedor</label>
				<select name="nomeFornecedor" id="nomeFornecedor" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
							<option selected="selected" value=""></option>
							<?php while($rowFuncionario = mysqli_fetch_assoc($resultFuncionario))
						  {?>
							<option value="<?=$rowFuncionario['idEmpresa']?>"><?=$rowFuncionario['nomeFornecedor']?></option>
							<?php }?>
				</select>
			</div>
			<div class="col-md-2" style="padding: 0;"> 
				<label for="nomeFornecedor" style="opacity: 0;">Nome</label>
				<a><button type="button" class="btn btn-info" data-toggle="modal" data-target="#m">Novo</button></a>
			</div>

			</div>
			<div class="form-group">
        		<label for="">Data Prevista</label>
        		<input type="text" name="data" value="" class="form-control" ui-jp="datetimepicker" ui-options="{
				format: 'DD-MM-YYYY',
				icons: {
				  time: 'fa fa-clock-o',
				  date: 'fa fa-calendar',
				  up: 'fa fa-chevron-up',
				  down: 'fa fa-chevron-down',
				  previous: 'fa fa-chevron-left',
				  next: 'fa fa-chevron-right',
				  today: 'fa fa-screenshot',
				  clear: 'fa fa-trash',
				  close: 'fa fa-remove'
				}
			  }" required />
    		</div>

    		<div class="form-group">
        		<label for="">Valor Previsto:</label>
        		<input type="text" name="valorPrevisto" value="" class="form-control" required="" />
    		</div>

			<div class="form-group">
       			 <label for="">Descrição:</label>
        		<textarea name="descricaoEntrada" class="form-control" required></textarea>
    		</div>    		

		    <div class="row col-md-12">
		              <label style="width: 100%;">Tipo:</label>
		             
		              <div class="radio">
		                <label class="ui-check" style="float: left;">
		                  <input type="radio" name="idTipo" value="1" checked />
		                  <i class="dark-white" style="border: 1px solid #ccc;"></i>
		                 Realista
		                </label>
		              </div>
		              <div class="radio" >
		                <label class="ui-check" style="float: left; margin-left: 2%;">
		                 <input type="radio" name="idTipo" value="3" />
		                  <i class="dark-white" style="border: 1px solid #ccc;"></i>
		                  Pessimista
		                </label>
		              </div>
		              <div class="radio">
		                <label class="ui-check" style="float: left; margin-left: 2%;">
		                  <input type="radio" name="idTipo" value="4" />
		                  <i class="dark-white" style="border: 1px solid #ccc;"></i>
		                  Optimista
		                </label>
		              </div>
		        </div><!--row-->
				
		 		<input type="submit" name="entrada" value="Adicionar" class="btn btn-info" style="float: right;" />
		
	  
    </div>
  </div>
 </div>
</form>