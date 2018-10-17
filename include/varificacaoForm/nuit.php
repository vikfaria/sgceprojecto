<?php
require_once ('../../Connections/connection.php');
$nuit = $_POST['nuit'];
$emp = $_POST['emp'];
$sqlAdd = '';
	if($emp != 0)
		$sqlAdd = " AND `idEmpresa` != '$emp'";
	
$sql = "SELECT `nuit` FROM `tblempresas` WHERE `nuit` LIKE '$nuit'".$sqlAdd;
$result = mysqli_query($con, $sql);
echo mysqli_num_rows($result);