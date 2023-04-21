<!DOCTYPE html>
<html>
	<head>
	<title>R1: Δημιουργία Φυσιοθεραπευτηρίου (Όνομα, Διεύθυνση, ΑΦΜ)</title>
</head>
    <body>
		<h1>R1: Δημιουργία Φυσιοθεραπευτηρίου (Όνομα, Διεύθυνση, ΑΦΜ)</h1>
		<br>

<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "physiop";
	$tabname = "r1";

    session_start();

	// Create a connection to the database
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check if the connection was successful
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}

    // Outputs all database entries for $tabname
	$sql = "SELECT * FROM $tabname";
	$result = mysqli_query($conn, $sql);

	echo "<br>";
    // output data of each row
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			echo "<br> id: " . $row["id"] . " - Name: " . $row["namePhysio"] . "Address: " . $row["addressPhysio"] . "AFM" . $row["afmPhysio"] . "<br>";
		}
	} else {
		echo "0 results <br>";
	} 

    $conn->close();
?> 

<a href="index.php"> Αρχική </a><br>
    </body>
</html>

