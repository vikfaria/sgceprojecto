<?php
include '../../connections/Connection.php';
$mes = $_POST['id'];
$sqlAdd = '';
if($mes != 0)
	$sqlAdd = " AND MONTH(STR_TO_DATE(dataPrevista, '%Y-%m-%d'))='$mes'";
	
$sqlReceitas = "SELECT SUM(valorPrevisto) as valor FROM `tblfluxo` WHERE `idTipoFluxo` = 1 ".$sqlAdd;
$sqlDespesas = "SELECT SUM(valorPrevisto) as valor FROM `tblfluxo` WHERE `idTipoFluxo` = 2 ".$sqlAdd;

$resultReceitas = mysqli_query($con, $sqlReceitas);
$resultDespesas = mysqli_query($con, $sqlDespesas);
$rowResultEntr = mysqli_fetch_assoc($resultReceitas);
$rowResultDesp = mysqli_fetch_assoc($resultDespesas);
$numEntradas = $rowResultEntr['valor'];
$numSaidas = $rowResultDesp['valor'];

$mensagem='';
if($numEntradas == 0 && $numSaidas==0)
	echo "<script>alert('O mês selecionado não possui nenhuma Receita ou Despesa')</script>";
else if($numEntradas == 0 && $numSaidas!=0)
	$numEntradas = 0;
else if($numEntradas != 0 && $numSaidas==0)
	$numSaidas = 0;

?>
<div ui-jp="chart" ui-options=" {
  tooltip : {
	  trigger: 'item',
	  formatter: '{a} <br/>{b} : {c} ({d}%)'
  },
  legend: {
	  orient : 'vertical',
	  x : 'left',
	  data:['Receitas','Despesas']
  },
  calculable : true,
  series : [
	  {
		  name:'Source',
		  type:'pie',
		  radius : '50%',
		  center: ['61%', '60%'],
		  data:[
			  {value:<?php echo $numSaidas;?>, name:'Despesas'},
			  {value:<?php echo $numEntradas;?>, name:'Receitas'}
		  ],
		  itemStyle: {
			  normal: {
				  color: function(params) {
					  var colorList = [
						'#C1232B','#6cc788'
					  ];
					  return colorList[params.dataIndex]
				  },
				  label: {
					  show: true,
					  position: 'top',
					  formatter: '{b}\n{c}'
				  }
			  }
			}
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
