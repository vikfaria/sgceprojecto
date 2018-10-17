<?php
$sqlFuncionario = "SELECT `idEmpresa`,`nomeFornecedor` FROM `tblempresas`";
	$resultFuncionario = mysqli_query($con, $sqlFuncionario);

if(isset($_GET['id']))
{
    $saidaId = $_GET['id'];	
	$data=date('d-m-Y');
	
	@$sql="SELECT * FROM `tblfluxo`, `paramtipos` WHERE `paramtipos`.`idTipo` LIKE `tblfluxo`.`idTipo` AND `tblfluxo`.`idTipoFluxo`=1 AND `tblfluxo`.`idfluxo`='$saidaId'";
    $stmt=mysqli_query($con, $sql);
	$linha=mysqli_fetch_assoc($stmt);
	
	$idEmpresa = $linha['idEmpresa'];
	$tipoFluxo=$linha['idTipo'];
		
	$sqlEmpresa = "SELECT * FROM `tblempresas` WHERE idEmpresa='".$idEmpresa."'";
		 $stmtEmpresa=mysqli_query($con, $sqlEmpresa);
		 $resulEmpresa=mysqli_fetch_assoc($stmtEmpresa);
}
	 
// Gravando dados da guia na Base de Dados
if(isset($_POST['saida']))
{   

    $descricaoEntrada           = $_POST['descricaoEntrada'];
	$valorPrevisto				= $_POST['valorPrevisto'];
	$dataPrevista    			= date("Y-m-d", strtotime($_POST['data']));
	$Tipo			= $_POST['idTipo'];
	$idEmpresa =$_POST['nomeFornecedor'];
    
	$saidaId = $_GET['id'];	
	
    @$stmtGM ="UPDATE `tblfluxo` SET `descricaofluxo`='$descricaoEntrada',`dataPrevista`='$dataPrevista',`valorPrevisto` = '$valorPrevisto',`idTipo`='$Tipo'  WHERE `tblfluxo`.`idfluxo` = '".$saidaId = $_GET['id']."'";
   
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
<form action="editarEntradas.php?id=<?=$saidaId?>" method="post" name="form1" id="form1">
  <div class="box">
      <div class="row box-body">
          <div class="col-md-7">
 
   <input type="hidden" name="idEntrada" value="" size="32" />
    
      <div class="form-group">

      <label for="nomeFornecedor">Nome do Cliente</label>
		  <select name="nomeFornecedor" id="nomeFornecedor" class="form-control select2" ui-jp="select2" ui-options="{theme: 'bootstrap'}" required>
                <option selected="selected" value="<?=$resulEmpresa['nomeFornecedor'];?>"><?=$resulEmpresa['nomeFornecedor'];?></option>
				<?php while($rowFuncionario = mysqli_fetch_assoc($resultFuncionario))
			  {?>
				<option value="<?=$rowFuncionario['idEmpresa']?>"><?=$rowFuncionario['nomeFornecedor']?></option>
		<?php }?>
       </select>
        </div>

        <div class="form-group">
      <label>Data Prevista:</label>
      <input type="text" value="<?=date("d-m-Y", strtotime($linha['dataPrevista']))?>" name="data" ui-jp="datetimepicker" ui-options="{
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
          }" class="form-control">
       </div>   
       <div class="form-group">
             <label for="">Valor previsto:</label>
           <input type="text" name="valorPrevisto" value="<?=$linha['valorPrevisto'];?>" class="form-control" required />
        </div>
        <div class="form-group">
             <label for="">Descrição:</label>
            <textarea name="descricaoEntrada" class="form-control"  required><?=$linha['descricaofluxo'];?></textarea>
        </div> 
         
        
   
    <div class="form-group">
      <label>Tipo:</label>
        <?php if($tipoFluxo=='1'){ ?>
		
          <input type="radio" checked name="idTipo" value="1" />
            Realista
        
	
          <input type="radio" name="idTipo" value="3" />
            Pessimista
        
        
          <input type="radio" name="idTipo" value="4" />
            Optimista
        
		<?php
		}
		else if($tipoFluxo=='3'){
			?>
			<input type="radio"  name="idTipo" value="1" />
            Realista
      
          <input type="radio" checked name="idTipo" value="3" />
            Pessimista
        
          <input type="radio" name="idTipo" value="4" />
            Optimista
     
		<?php
		} else if($tipoFluxo=='4'){?>
		
          <input type="radio"  name="idTipo" value="1" />
            Realista
        
          <input type="radio"  name="idTipo" value="3" />
            Pessimista
       <input type="radio" checked name="idTipo" value="4" />
            Optimista
       
		<?php
		}
		?>
        
    </div>
    <div class="text-center">
    <input type="submit" name="saida" value="Actualisar" class="btn btn-info" />
    </div>
   </div>
   </div>
   </div>
</form>