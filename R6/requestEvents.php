<?php
    require('../Utils/dbconnection.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $range_start = $_POST["range_start"];
        $range_end = $_POST["range_end"];
        $status = $_POST["status"];
        $db = new DBConnection();
        if ($db->connect()) {
            $sql = "SELECT *  FROM `requests` WHERE `date_time` BETWEEN '$range_start' AND '$range_end' AND `status` = '$status';";
            $result = $db->query($sql);
            if ($result->num_rows > 0) {
                $requests = array();
                while($row = $result->fetch_assoc()) {
                    // $event = new Event();
                    // $event->id = $row["id"]; 
                    // $event->physio_center = $row["physio_center"];
                    // $event->patient_id = $row["patient_id"];
                    // $event->date_time = $row["date_time"];
                    // $event->status = $row['status'];
                    array_push($requests, $row); 
                }
                echo json_encode($requests);
            }
        }
        $db->close();
    }
?>