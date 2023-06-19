<?php

$host = "localhost";
$uname = "id20930892_physio_user";
$pass = "Physio__Plus_User2023";
$dbname = "id20930892_physio_plus";

$dbh = mysqli_connect($host, $uname, $pass, $dbname) or die("Cannot connect to the database.");
mysqli_set_charset($dbh, "utf8");

// Retrieve the patientName variable from the Java class
$patientName = $_POST['patientName'];

// Use mysqli_real_escape_string to prevent SQL injection
$escapedPatientName = mysqli_real_escape_string($dbh, $patientName);

$sql = "SELECT date, hours, notes FROM sessions WHERE name = '$escapedPatientName'";

$result = mysqli_query($dbh, $sql);

if (!$result) {
    die("Query execution failed: " . mysqli_error($dbh));
}

$row = mysqli_fetch_assoc($result);


$data = array(
    "date" => $row['date'],
    "hours" =>$row['hours'],
    "notes" =>$row['notes']
);

$response = json_encode($data, JSON_UNESCAPED_UNICODE);

echo $response;

mysqli_close($dbh);


?>