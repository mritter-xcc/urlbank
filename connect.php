<?php
	//variables for connection info
	$host = "localhost";
	$user = "admin";
	$password = "letmein";
	$database = "url_bank";

	//create link to server, store in variable
	$link = mysqli_connect($host, $user, $password, $database);

	//if connection fails
	if(!$link) {
		die("Connection failed: " . mysqli_connect_error());
		exit;
	}
?>