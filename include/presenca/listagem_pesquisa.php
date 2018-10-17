<?php
require_once ('../../Connections/connection.php');
require_once ('../../get/variaveis.php');
include ("../../Classes/classes.php");
require_once ('../../Classes/Presenca.php');

$aux = new classes();

$presente = $_POST['presente'];
$ausente = $_POST['ausente'];
$percurso = $_POST['percurso'];
$data = $_POST['data'];
$nomeA = $_POST['nomeA'];
$sqlAdd = "";
 	

if($presente == 'true'){
    $sqlAdd .= " AND id_estadopresenca = 1";
}
if($ausente == 'true'){
    $sqlAdd .= " AND id_estadopresenca = 2";
}
if($percurso != 'true'){
    $sqlAdd .= " AND `id_tpresenca` = '$percurso'";
}
if($nomeA != ''){
    $sqlAdd .= " AND `tblaluno`.`id_aluno` = '$nomeA'";
}
if($data != ''){
    $sqlAdd .= " AND `data_presenca` = '$data'";
}


    //Apresentacao de resultados
    $sqlActividade = "SELECT * FROM `tblpresenca`,`tblaluno`  WHERE `tblpresenca`.`id_aluno` LIKE `tblaluno`.`id_aluno`".$sqlAdd."";
    // ORDER BY id_Actividade DESC";
   
   
    $consulta = mysqli_query($con,$sqlActividade);
    $numero = mysqli_num_rows($consulta);

    while ($linha1 = mysqli_fetch_assoc($consulta)) {
    
	$id_presenca = $linha1['id_presenca'];
    $foto = $linha1['foto'];
	$id_aluno = $linha1['id_aluno'];	
    $id_zona = $linha1['id_zona'];
    $id_estadopresenca = $linha1['id_estadopresenca'];
	$id_carrinha = $linha1['id_carrinha'];
    $id_estado = $linha1['id_estado'];
	$id_tpresenca = $linha1['id_tpresenca'];
	$hora_presenca = $linha1['hora_presenca'];
	$estadopresenca = $linha1['id_estadopresenca'];
	$aluno = $aux->getRow("tblaluno", "nome_aluno", "id_aluno", $id_aluno);
    $morada = $aux->getRow("tblzona", "nome_zona", "id_zona", $id_zona);
	$estadopresenca = $aux->getRow("tblestadopresenca", "nome_estadopresenca", "id_estadopresenca", $id_estadopresenca);
    $carinha = $aux->getRow("tblcarinha", "matricula", "id_carrinha", $id_carrinha);
   
?>
  <tr>
    <td ><?=$foto?></td>
	<td ><?=$aluno?></td>
	<td ><?=$morada?></td>
	<td ><?=$carinha?></td>
	<td ><?=$hora_presenca?></td>
    <td ><?=$hora_presenca?></td>
	<td ><?=$estadopresenca?></td>
       
  </tr>
        <?php
    }
?>