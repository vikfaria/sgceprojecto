<?php
include '../../connections/Connection.php';
$idTipo = $_POST['id'];
$mesSaldo = $_POST['mesSaldo'];
$sqlAdd='';
$inicial = ''; 
$saldoAnterior = 0;
$mesCurso = date('m'); //presente mes

if($mesSaldo != '')
	$mesCurso = $mesSaldo;

if($idTipo != '') //Se o tipo nao Estiver vazio
$sqlAdd .= " AND `tblfluxo`.`idTipo` = '$idTipo'";
$sqlFluxo = "SELECT DAY(STR_TO_DATE(dataPrevista,'%Y-%m-%d')) AS diaP, valorPrevisto, idTipoFluxo FROM `tblfluxo`, tblempresas where tblfluxo.idempresa=tblempresas.idempresa AND MONTH(STR_TO_DATE(dataPrevista,'%Y-%m-%d'))>='$mesCurso' ".$sqlAdd." ORDER BY DAY(STR_TO_DATE(dataPrevista,'%Y-%m-%d')) ASC";


$resultFluxo = mysqli_query($con, $sqlFluxo);
$resultTod = mysqli_query($con, $sqlFluxo);


//Valor Total dos Meses que se passaram
$sqlFluxoSaldoE = "SELECT SUM(valorPrevisto) as total FROM `tblfluxo`, tblempresas where tblfluxo.idempresa=tblempresas.idempresa AND MONTH(STR_TO_DATE(dataPrevista,'%Y-%m-%d'))<'$mesCurso' AND `tblfluxo`.`idTipoFluxo`=1 ".$sqlAdd;
$sqlFluxoSaldoS = "SELECT SUM(valorPrevisto) as total FROM `tblfluxo`, tblempresas where tblfluxo.idempresa=tblempresas.idempresa AND MONTH(STR_TO_DATE(dataPrevista,'%Y-%m-%d'))<'$mesCurso' AND `tblfluxo`.`idTipoFluxo`=2 ".$sqlAdd;
$ResultDataE = mysqli_query($con, $sqlFluxoSaldoE);
$ResultDataS = mysqli_query($con, $sqlFluxoSaldoS);

$RowDataE = mysqli_fetch_assoc($ResultDataE);
$RowDataS = mysqli_fetch_assoc($ResultDataS);
	
	$valorE = $RowDataE['total'];
	$valorS = $RowDataS['total'];
	$saldoAnterior = $valorE - $valorS;
	if($saldoAnterior != 0)
		$inicial = "[0,".$saldoAnterior."],";
?>
<div ui-jp="chart" ui-options="{
              tooltip : {
                  trigger: 'axis'
              },
              legend: {
                  data:['Saldo']
              },
              calculable : true,
			  grid : {
                  x: 60
                },
              xAxis : [
                  {
                      type: 'value'
                  }
              ],
              yAxis : [
                  {
                      type: 'value',
                      axisLine: {
                          lineStyle: {
                              color: '#dc143c'
                          }
                      }
                  }
              ],
              series : [
                  {
                      name:'Saldo',
                      type:'line',
                      data:[<?=$inicial?>
                          <?php
				if($inicial != '')
				{
					$virgula = ',';
					$saldo = $saldoAnterior;
				}
				else{
					$virgula = '';
					$saldo = 0;
				}
				
				while($rowTodasD = mysqli_fetch_assoc($resultTod)){
				$dia = $rowTodasD['diaP'];
				$tipo = $rowTodasD['idTipoFluxo'];
				$valorP = $rowTodasD['valorPrevisto'];
				if($tipo == 1 || $tipo == 0)
				{
					$saldo = $valorP + $saldo;
				}
				else if($tipo == 2)
				{
					$saldo = $saldo - $valorP;
				}
			  echo $virgula."[".$dia.", ".$saldo."]";
			  $virgula = ',';
		}
			?>
                      ]
                  }
              ] 
            }" style="height:300px" >
            </div>
<!-- Bootstrap -->
  <script src="../libs/jquery/tether/dist/js/tether.min.js"></script>

  <script src="scripts/ui-jp.js"></script>
  <script src="scripts/ui-include.js"></script>
  <script src="scripts/ui-device.js"></script>

  <script src="scripts/app.js"></script>


<!-- endbuild -->
