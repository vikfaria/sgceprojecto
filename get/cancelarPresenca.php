<?php

require_once ('../Connections/connection.php');
require_once ('../get/variaveis.php');


$sql = "DELETE FROM `tblpresenca` WHERE id_presenca = '$id'";

$stmt=mysqli_query($con, $sql);



<?