<?php 
 require('../Utils/dbconnection.php');

 $db = new DBConnection();
 $db->connect();

 try {
 $patient_id = $_POST["patient_id"];
 $sql = "SELECT DISTINCT(patient_id), tax_id_number as center_id, 
                    name as center_name, id as session_id, 
                    date as session_date, notes as session_notes,
                    code as service_code, title as service_title, 
                    description as service_desc, cost as service_cost
            FROM 
            ((sessions JOIN financial_moves USING (patient_id)) 
            JOIN services ON code=service_id) 
            JOIN physio_centers ON physio_center_id=tax_id_number
            WHERE patient_id=$patient_id;
            ";
    $result = $db->query($sql);
    $results = array("history" => array());
    while ($row = $result->fetch_assoc()) {
        $center = array(
            "tax_id_number" => $row["center_id"], 
            "name" => $row["center_name"]
        );
        $session = array(
            "id" => $row["session_id"], 
            "date" => $row["session_date"], 
            "notes" => $row["session_notes"], 
            "services" => array()
        );
        array_push(
            $session["services"], 
            array(
                "title" => $row["service_title"], 
                "code" => $row["service_code"],
                "description" => $row["service_desc"],
                "cost" => $row["service_cost"]
            )
        );
        array_push(
            $results["history"], 
            array("center" => $center, "session" => $session)
        );
    }
    echo json_encode($results);
 } catch (Exception $e) {
    echo "No request";
 }
?>