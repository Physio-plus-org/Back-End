<?php

$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "physio_app";

$dbh = mysqli_connect($host, $uname, $pass, $dbname) or die("Cannot connect to the database.");
mysqli_set_charset($dbh, "utf8");

// Query to fetch patient details
$sqlPatient = "SELECT CONCAT(first_name, ' ', last_name) AS name, age, address FROM patients WHERE soc_sec_reg_num = '287261045727'";
$resultPatient = mysqli_query($dbh, $sqlPatient);

if (!$resultPatient) {
    die("Query execution failed: " . mysqli_error($dbh));
}

$rowPatient = mysqli_fetch_assoc($resultPatient);

// Query to fetch session details
$sqlSession = "SELECT date, hours, notes FROM sessions WHERE id='1'";
$resultSession = mysqli_query($dbh, $sqlSession);

if (!$resultSession) {
    die("Query execution failed: " . mysqli_error($dbh));
}

$rowSession = mysqli_fetch_assoc($resultSession);

$data = array(
    "name" => $rowPatient['name'],
    "age" => $rowPatient['age'],
    "address" => $rowPatient['address'],
    "date" => $rowSession['date'],
    "hours" => $rowSession['hours'],
    "notes" => $rowSession['notes']
);

$response = json_encode($data, JSON_UNESCAPED_UNICODE);

echo $response;

mysqli_close($dbh);

?>
