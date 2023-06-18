<?php
 require('../Utils/dbconnection.php');
 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $db = new DBConnection();
 if ($db->connect()) {
    $sql = "SELECT * FROM services;";
    $result = $db->query($sql);
    if ($result->num_rows > 0) {
        $response = array();
        while($row = $result->fetch_assoc()) {
            array_push($response, $row); 
        }
        echo json_encode($response);
    }
 }
 $db->close();
}
?>