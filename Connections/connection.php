<?php

//localhost
	$hostname = "localhost";
	$database = "sgce";
	$username = "root";
	$password = "";

	$con=mysqli_connect($hostname, $username,$password) or trigger_error(mysqli_error(),E_USER_ERROR);
	
	mysqli_select_db($con, $database);
	
	mysqli_query($con, "SET NAMES 'utf8'");
	mysqli_query($con, 'SET character_set_connection=utf8');
	mysqli_query($con, 'SET character_set_client=utf8');
	mysqli_query($con, 'SET character_set_results=utf8');
