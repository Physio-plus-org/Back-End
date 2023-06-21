<?php
require("../Utils/dbconnection.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $physio_center = $row["physio_center"];
                $patient_id = $row["patient_id"];
                $date_time = $row["date_time"];
                $status = $row['status'];
                
            
            $db = new DBConnection();
            if ($db->connect()) {
                $sql = "SELECT * FROM requests";
                $result = $db->query($sql);
            }
            $db->close();
            
            echo json_encode($requests);
        

            header('Content-Type: application/json');
            echo json_encode($results);
}
   
?>
