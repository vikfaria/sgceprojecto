<?php 
require_once ('../../Connections/connection.php');
require_once ('../../get/variaveis.php');
include ("../../Classes/classes.php");
require_once ('../../Classes/Presenca.php');



$cad = new cadastropresenca();
$aux = new classes();

$sql = "SELECT * FROM `tblpresenca`";
$stmt=mysqli_query($con, $sql);

date_default_timezone_set('Africa/Maputo');
$current_time = date('H:i:s');
 $loc = $_POST['location'];
 $lat =  $_POST['latitude'];
 $longi = $_POST['longitude'];

 if($loc == ''){
	$loc = 0;
	}
 if($lat == ''){
	$lat = 0;
   } 
  if($longi == ''){
	 $longi = 0;
 }


$val = $_POST['estado'];
$ader = $_POST['aderencia'];
$tip_pre = $_POST['tipo_presenca'];
$estPresenca = $_POST['estadopresente'];

$aderencia = $aux->getAderencia($ader);
$estado = $aux->getEs($val);
$tipo_presenca = $aux->getTpresenca($tip_pre);
$estadopresenca = $aux->getEstadoPresenca($estPresenca);

if($_POST['aderencia'])
{
    $id_aluno        = $aderencia['id_aluno'];
	$data_presenca   = date('y-m-d');
    $hora_presenca   = $current_time;
	$id_educadora	 = $aderencia['id_educadora'];
	$id_carrinha	 = $aderencia['id_carrinha'];
    $latitude        = $lat;
	$longitude       = $longi;
	$nome_rua        = $loc;
    $id_zona         = $aderencia['id_zona'];
    $id_estado       = $estado['id_estado'];
	$id_tpresenca    = $tipo_presenca['id_tpresenca'];
	$id_estadopresenca    = $estadopresenca['id_estadopresenca'];
	

    $cad -> setId_aluno($id_aluno);
    $cad -> setData_presenca($data_presenca);
    $cad -> setHora_presenca($hora_presenca);
    $cad -> setId_educadora($id_educadora);
    $cad -> setId_carrinha($id_carrinha);
	$cad -> setLatitude($latitude);
	$cad -> setLongitude($longitude);
	$cad -> setNome_rua($nome_rua);
	$cad -> setId_zona($id_zona);
	$cad -> setId_estado($id_estado);
	$cad -> setId_tpresenca($id_tpresenca);
	$cad -> setId_estadopresenca($id_estadopresenca);
	
	$cad -> IntroduzDadosPresenca();
	 
}	
?>
