<?php
require('dbconnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $patient_id = $_POST["patient_id"];
 $db = new DBConnection();
 $conn= $db->connect();
 if($conn){
    if ($patient_id == "*") {
        $sql = "SELECT * FROM patients;";
    } else {
        $sql = "SELECT * FROM patients WHERE soc_sec_reg_num='".$patient_id."';";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $response = array();
        while($row = $result->fetch_assoc()) {
            array_push($response, $row);
        }
        echo json_encode($response);
    }
 }else{
    echo "not connected";
 }
}
 ?>