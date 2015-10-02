<?php
	define("HOSTNAME", "localhost");
	define("USERNAME", "kerim");
	define("PASSWORD", "884891km_");
	define("DATABASE", "kerimgrozny");

	// 1. Create a database connection
	$connection = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($connection,'UTF8');
	// Test if connection succeeded
	if(mysqli_connect_errno()) {
		die("Database connection failed: " . 
	     mysqli_connect_error() . 
	     " (" . mysqli_connect_errno() . ")"
		);
	}
?>