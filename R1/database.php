<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "physiop";
	$tabname = "r1";

	//Create connection
	$conn = mysqli_connect($servername, $username, $password);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	// Create database
	$sql = "CREATE DATABASE IF NOT EXISTS $dbname";

	if (mysqli_query($conn, $sql)) {
		echo "Database created successfully<br>";
		} else {
		echo "Error creating database: " . mysqli_error($conn);
		}
	
	mysqli_close($conn);
	

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// sql to create table
	$sql = "CREATE TABLE IF NOT EXISTS $tabname (
		id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		namePhysio VARCHAR(50) NOT NULL,
		addressPhysio VARCHAR(70) NOT NULL,
		afmPhysio VARCHAR(9) UNIQUE KEY,
		username varchar(50) NOT NULL,
		passwd varchar(50) NOT NULL
	)";
	
	if (mysqli_query($conn, $sql)) {
		echo "Table " . $tabname ." created successfully";
		} else {
		echo "Error creating table: " . mysqli_error($conn);
		}

	mysqli_close($conn);


?> 
