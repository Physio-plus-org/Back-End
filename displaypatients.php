<?php

$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "physio_app";

$dbh = mysqli_connect($host, $uname, $pass, $dbname) or die("Cannot connect to the database.");
mysqli_set_charset($dbh, "utf8");

$sql = "SELECT CONCAT(first_name,' ', last_name) AS name, age, address FROM patients WHERE soc_sec_reg_num = '279869537922'";

$result = mysqli_query($dbh, $sql);

if (!$result) {
    die("Query execution failed: " . mysqli_error($dbh));
}

$row = mysqli_fetch_assoc($result);


$data = array(
    "name" => $row['name'],
    "age" =>$row['age'],
    "address" =>$row['address']
);

$response = json_encode($data, JSON_UNESCAPED_UNICODE);

echo $response;

mysqli_close($dbh);

?>
