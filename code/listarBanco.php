<?php 
$sql="SELECT * FROM `tblbanco`";
$stmt=mysqli_query($con, $sql);
?>
<table name="tabela" id="tabela" class="table m-b-none" style="text-align: center">
      <thead >
      <tr align="center" >
        <th style="text-align: center">Nome do Banco</th>
		<th style="text-align: center">Número da Conta</th>
        <th style="text-align: center">Saldo Inicial</th>
		<th style="text-align: center">Saldo Actual</th>
		<th style="text-align: center" st-sort="birthDate">Acções</th>
      </tr>
      </thead>
      <tbody class="tableBody">
<?php
     while($linha = mysqli_fetch_assoc($stmt))
     {		 
?>
  <tr>				
	<td ><?=$linha['nomeBanco'];?></td>
	<td ><?=$linha['numeroDaConta'];?></td>
	<td align="right"><?= number_format($linha['saldoInicial'],2,",",".");?></td>
	<td align="right"><?= number_format($linha['saldoActual'],2,",",".");?></td>  
	<td align="center"><a><button class="btn btn-sm btn-sm" data-toggle="modal" data-target="#modal<?php echo $linha['idBanco'];?>" data-toggle="tooltip" title="editar" <?=$disableButons?>><i class="glyphicon glyphicon-edit"></i></button></a></td>
	</tr>
	
	<!-- .modal -->
	<div id="modal<?php echo $linha['idBanco'];?>"  class="modal" data-backdrop="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Editar Banco</h5>
      </div>
      <div   class="modal-body  p-lg"> 
	  
	<?php
		$sqlEdit="SELECT * FROM `tblbanco` WHERE `idBanco`='".$linha['idBanco']."'";
		$stmtEdit=mysqli_query($con, $sqlEdit);
		$resultEmpresa=mysqli_fetch_assoc($stmtEdit);
	  ?>
	  
	  
	<form action="../code/editarBanco.php" method="post" name="form1" id="form1">
	
	<input type="hidden" name="bancoId" value="<?php echo $linha['idBanco'];?>">
			  <div class="row">
      <div class="col-md-7"><br>
          <div class="form-group">
              <label for="">Nome do Banco:</label>
              <input type="text" name="nomeBanco" value="<?=$resultEmpresa['nomeBanco'];?>" class="form-control" style="border-radius: 7px;" required/>
          </div>
     </div>
     <div class="col-md-5"><br>
         <div class="form-group">
            <label for="">Número da Conta:</label>
            <input type="text" name="numeroDaConta" value="<?=$resultEmpresa['numeroDaConta'];?>"   class="form-control" style="border-radius: 7px;" required/>
        </div>
      </div>
	  <div class="col-md-5"><br>
         <div class="form-group">
            <label for="">Saldo Inicial:</label>
            <input type="text" name="saldoInicial" value="<?=$resultEmpresa['saldoInicial'];?>"   class="form-control" style="border-radius: 7px;" required/>
        </div>
      </div>
      </div>
			  <div class="modal-footer">
				<button type="button" class="btn white p-x-md" data-dismiss="modal">Cancelar</button>
				<button type="submit" name="banco" class="btn btn-info p-x-md">Actualizar</button>
			  </div>
	</form>
			</div><!-- /.modal-content -->
		  </div>
		</div>
	  </div>
	</div>
	<!-- / .modal -->
<?php
     }
?>
</tbody>
</table>