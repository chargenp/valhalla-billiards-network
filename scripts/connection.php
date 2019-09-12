<?php
	$servername = "student2.cs.appstate.edu";
	$username = "hernandezgamezm";
	$password = "900687319";
	$dbname = "191_3430_102_t1";

	// Create connection
	$mysqli_conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($mysqli_conn->connect_error) {
		die("Connection failed: " . $mysqli_conn->connect_error);
	} 

