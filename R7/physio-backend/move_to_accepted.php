
<?php
    require('../Utils/dbconnection.php');
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $patientId = $_POST['patientName'];
        // $date_time = $row["date_time"];
        // $status = $row['status'];
        
        $db = new DBConnection();
        if ($db->connect()) {
            $sql = "SELECT * FROM requests WHERE patient_id = '$patientId'";
            $result = $db->query($sql);
        
           
                
            if ($result->num_rows > 0) {
                $requests = array();
                while($row = $result->fetch_assoc()) {
                    $physio_center = $row['physio_center'];
                    $date_time = $row['date_time'];
                    $status = $row['status'];
        
                   
                    $updateSQL = "UPDATE requests SET status = 'COMPLETED' WHERE status = 'UPCOMING'";
                    $result = $db->query($updateSQL);

                    // try {
                    //     $insertStmt = $database->prepare("INSERT INTO requests (physio_center,date_time,status, patientId) VALUES (?, ?, ?, ?, ?)");
                    //     $insertStmt->bind_param('sssss', $reason, $message, $time, $date, $patientId);
                    //     $insertStmt->execute();

                    //     $deleteStmt = $database->prepare("DELETE FROM upcomingAppoint WHERE patientId = ?");
                    //     $deleteStmt->bind_param('s', $patientId);
                    //     $deleteStmt->execute();

                    //     $database->commit();
                    //     echo "Transaction completed successfully";
                    // } catch (Exception $e) {
                    //     $database->rollback();
                    //     echo "Error: " . $e->getMessage();
                    // }
                     
            }   
            }else{
                    echo "No record found for the given name.";
        }
    
        $db->close();
    }}
    



?>
