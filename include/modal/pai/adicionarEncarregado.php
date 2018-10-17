<?php 
	require_once ('../Connections/connection.php');
	

	$sql1="SELECT * FROM `tblencarregado`";
	$a=mysqli_query($con, $sql1);

	$sql3="SELECT * FROM `tblzona`";
	$c=mysqli_query($con, $sql3);
?>

