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

$sqlPatient = "SELECT CONCAT(first_name, ' ', last_name) AS name, age, address FROM patients WHERE name = '$escapedPatientName'";
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
