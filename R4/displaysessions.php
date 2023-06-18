<?php

$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "physio_app";

$dbh = mysqli_connect($host, $uname, $pass, $dbname) or die("Cannot connect to the database.");
mysqli_set_charset($dbh, "utf8");

$sql = "SELECT date, hours, notes FROM sessions WHERE id='1'";

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