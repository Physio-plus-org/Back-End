<?php 
 require('../Utils/dbconnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

 $db = new DBConnection();
 $db->connect();

 try {
 $patient_id = $_POST["patient_id"];
 $sql = "SELECT 
	patient_id, 
	tax_id_number as center_id, 
    name as center_name, 
    id as session_id, 
    date as session_date,
    notes as session_notes,
    code as service_code,
    title as service_title, 
    description as service_desc,
    cost as service_cost,
    address
FROM 
	(
        (
            financial_moves fm 
            JOIN 
            physio_centers pc 
            ON fm.physio_center_id=pc.tax_id_number
    	) 
        JOIN
        sessions
        USING (patient_id)
	)
    JOIN
    services
    ON service_id=code
WHERE patient_id='$patient_id';";
    $result = $db->query($sql);
    $results = array();
    while ($row = $result->fetch_assoc()) {
        $center = array(
            "tax_id_number" => $row["center_id"], 
            "name" => $row["center_name"],
            "address" => $row["address"]
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
            $results, 
            array("center" => $center, "session" => $session)
        );
    }
    echo json_encode($results);
 } catch (Exception $e) {
    echo "No request";
 }
}
?>