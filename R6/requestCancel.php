<?php
require("../Utils/dbconnection.php");

$id = $_GET["id"];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $db = new DBConnection();
    if ($db->connect()) {
        $sql = "UPDATE `requests` SET `status` = 'CANCELED' WHERE `requests`.`id` = $id";
        $result = $db->query($sql);
        echo $result;
            
    }

    $db->close();
}
?>