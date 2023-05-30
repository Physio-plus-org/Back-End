<?php

$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "physio_app";

$dbh = mysqli_connect($host, $uname, $pass, $dbname) or die("Cannot connect to the database.");
mysqli_set_charset($dbh, "utf8");

$sql = "SELECT first_name AS name FROM patients WHERE soc_sec_reg_num = '279869537922'";

$result = mysqli_query($dbh, $sql);

if (!$result) {
    die("Query execution failed: " . mysqli_error($dbh));
}

$data = array();

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$response = json_encode($data, JSON_UNESCAPED_UNICODE);

$response = preg_replace_callback('/\\\\u([0-9a-fA-F]{4})/', function ($match) {
    return mb_convert_encoding(pack('H*', $match[1]), 'UTF-8', 'UTF-16BE');
}, $response);

echo $response;

mysqli_close($dbh);

?>
