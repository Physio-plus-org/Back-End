<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "physio";
$tabname = "physio_centers";


// Create connection
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

// Create tables
mysqli_select_db($conn, $dbname);

$sql = "CREATE TABLE `physio_centers` (
  `tax_id_number` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  PRIMARY KEY (`tax_id_number`)
)";

if (mysqli_query($conn, $sql)) {
    echo "Table " . $tabname ." created successfully<br>";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}



mysqli_close($conn);
?>
