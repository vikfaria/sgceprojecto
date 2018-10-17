<?php

require("phpsqlajax_dbinfo.php");

// Start XML file, create parent node

$dom = new DOMDocument("1.0");
$node = $dom->createElement("markers");
$parnode = $dom->appendChild($node);

// Opens a connection to a MySQL server
$connection=mysqli_connect ('localhost', $username, $password);

// Set the active MySQL database
$db_selected = mysqli_select_db($connection, $database);
if (!$db_selected) {
  die ('Can\'t use db : ' . mysql_error());
}

// Select all the rows in the markers table
$query = "SELECT * FROM `tblpresenca` WHERE 1";

$result = mysqli_query($connection, $query);;
if (!$result) {
  die('Invalid query: ' . mysql_error());
}

header("Content-type: text/xml");

// Iterate through the rows, adding XML nodes for each

while ($row = @mysqli_fetch_assoc($result)){
  // Add to XML document node
  $node = $dom->createElement("marker");
  $newnode = $parnode->appendChild($node);
  $newnode->setAttribute("id",$row['id_aluno']);
  $newnode->setAttribute("name",$row['id_estado']);
  $newnode->setAttribute("address", $row['nome_rua']);
  $newnode->setAttribute("lat", $row['latitude']);
  $newnode->setAttribute("lng", $row['longitude']);
  $newnode->setAttribute("type", $row['id_tpresenca']);
  $newnode->setAttribute("dat", $row['data_presenca']);
  $newnode->setAttribute("time", $row['hora_presenca']);  
}

echo $dom->saveXML();

?>