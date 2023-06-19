<?php 
require("../Utils/dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $ssrn = $_POST["ssrn"];
    $db = new DBConnection();
    if ($db->connect()) {
        $sql = "INSERT INTO patients (first_name, last_name, address, ssrn) VALUES ('".$first_name."','".$last_name."','".$address."','".$ssrn."');";
        $result = $db->query($sql);
    }
    $db->close();
}
?>


