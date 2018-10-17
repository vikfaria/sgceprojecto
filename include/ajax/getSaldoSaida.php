<?php
include '../../Connections/connection.php';
	
	$id = $_POST['id'];
	$leva = $_POST['leva'];
	$sql ="SELECT * FROM `tblbanco` WHERE `idBanco`='".$id."'";
	$stmt=mysqli_query($con, $sql);
	$row=mysqli_fetch_assoc($stmt);	
	$saldoAcual = $row['saldoActual'];
	
	$total= $saldoAcual - $leva;	
	?>
    
	<div class="form-group col-md-6 col-xs-6">
		<label>Saldo Antes da Execução:</label>
		<div>
			<input type="text" style="text-align:right" name="saldo" id="saldoSaida" value="<?php echo number_format($saldoAcual,2,",","."); ?>" readonly  class="form-control" />
		</div>
	</div>
	<div class="form-group col-md-6 col-xs-6">
		<label>Saldo Ap&oacute;s Execução:</label>
		<input type="text" style="text-align:right" name="saldoActual" id="saldoActualEntrada" value="<?=number_format($total,2,",",".")?>" size="32" readonly  class="form-control" />
	</div>
	
	<script >
$(document).ready(function(){
		document.getElementById("executar").disabled =true;
        var saldo=document.getElementById("saldoActualEntrada").value;
        var total=parseCurrency(saldo);
        
    if(total <= 0)
        document.getElementById("executar").disabled =true;
    else
        {
            document.getElementById("executar").disabled =false;
        }
});
	</script>