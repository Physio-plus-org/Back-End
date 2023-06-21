<?php
    require('../Utils/dbconnection.php');

    class Event {  
    }
    
    $range_start = $_GET["range_start"];
    $range_end = $_GET["range_end"];
    $status = $_GET["status"];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $p_id = $_POST["patient_id"];
        $s_id = $_POST["service_id"];
        $date_time = $_POST["date_time"];
        $status = $_POST["status"];
        $db = new DBConnection();
        if ($db->connect()) {
            $sql = "INSERT INTO sessions (patient_id, service_id, date, status) VALUES ('".$p_id."','".$s_id."','".$date."','".$note."');";
            $result = $db->query($sql);
        }
        $db->close();
    }
    ?>
?>