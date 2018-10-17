

<html>
    <head>
        <title>Basic Web Page</title>
    </head>
    <body>
<?php 
require_once '../Connections/connection.php';

$sql="SELECT * FROM tblaluno";
$result=mysqli_query($con, $sql);

$json_array = array();

while($row = mysqli_fetch_assoc($result))
{
	$json_array[] = $row;
}

  echo json_encode($json_array);
    /*echo '<pre>';
	print_r($json_array);
	echo '</pre>';*/

?>
    </body>
</html>