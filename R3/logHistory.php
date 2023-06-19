<?php 
require("../Utils/dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namep = $_POST["first_name"];
    $surname = $_POST["last_name"];
    $soc_sec_reg_num = $_POST["ssrn"];
    $address = $_POST["address"];
    $db = new DBConnection();
    if ($db->connect()) {
        $sql = "INSERT INTO patients (first_name, last_name, ssrn, address) VALUES ('".$namep."','".$surname."','".$soc_sec_reg_num."','".$address."');";
        $result = $db->query($sql);
    }
    $db->close();
}
?>


