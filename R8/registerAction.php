<?php 
require("../Utils/dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $p_id = $_POST["patient_id"];
    $s_id = $_POST["service_id"];
    $date = $_POST["date"];
    $note = $_POST["note"];
    $db = new DBConnection();
    if ($db->connect()) {
        $sql = "INSERT INTO sessions (patient_id, service_id, date, notes) VALUES ('".$p_id."','".$s_id."','".$date."','".$note."');";
        $result = $db->query($sql);
    }
    $db->close();
}
?>