<?php
require('../Utils/dbconnection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new DBConnection();

    if ($db->connect()) {
        $ssrn = $_POST['amka'];

        $sql = "SELECT CONCAT(first_name, ' ', last_name) AS name, address, ssrn FROM patients WHERE ssrn = '$ssrn'";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            $output = array();
            while ($row = $result->fetch_assoc()) {
                array_push($output, $row);
            }

            $json = json_encode($output);
            echo $json;
        } else {
            echo "No records found.";
        }
    } else {
        echo "Not connected";
    }

    $db->close();
}
?>
