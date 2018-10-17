<?php
require_once("../Connections/connection.php");
class Questoes 
{
	var $con;
	
	function getNumQuestoes($idInquerito)
	{
		$sql = "SELECT `questInqueritoId` FROM `tblquestoes` WHERE `questInqueritoId` = '$idInquerito'"
		$resut = mysqli_query(this->con, $sql);
		return mysqli_num_rows($resut);
	}
}