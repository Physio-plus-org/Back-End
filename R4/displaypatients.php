<?php

$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "physio_app";

$dbh = mysqli_connect($host, $uname, $pass, $dbname) or die("Cannot connect to the database.");
mysqli_set_charset($dbh, "utf8");

$sqlPatient = "SELECT CONCAT(first_name, ' ', last_name) AS name, age, address FROM patients WHERE soc_sec_reg_num = '287261045727'";
$resultPatient = mysqli_query($dbh, $sqlPatient);

if (!$resultPatient) {
    die("Query execution failed: " . mysqli_error($dbh));
}

$rowPatient = mysqli_fetch_assoc($resultPatient);

$data = array(
    "name" => $rowPatient['name'],
    "age" => $rowPatient['age'],
    "address" => $rowPatient['address'],
    "sessions" => array()
);

$sqlSession = "SELECT date, hours, notes FROM sessions WHERE patient_id = '287261045727' ORDER BY date";
$resultSession = mysqli_query($dbh, $sqlSession);

if (!$resultSession) {
    die("Query execution failed: " . mysqli_error($dbh));
}

while ($rowSession = mysqli_fetch_assoc($resultSession)) {
    $session = array(
        "date" => $rowSession['date'],
        "hours" => $rowSession['hours'],
        "notes" => $rowSession['notes']
    );
    $data['sessions'][] = $session;
}

$response = json_encode($data, JSON_UNESCAPED_UNICODE);

echo $response;

mysqli_close($dbh);

?>
