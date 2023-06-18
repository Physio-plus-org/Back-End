<?php 
require("../Utils/dbconnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $namep = $_POST["namep"];
    $surname = $_POST["surname"];
    $soc_sec_reg_num = $_POST["soc_sec_reg_num"];
    $address = $_POST["address"];
    $db = new DBConnection();
    if ($db->connect()) {
        $sql = "INSERT INTO patients (namep, surname, soc_sec_reg_num, address) VALUES ('".$namep."','".$surname."','".$soc_sec_reg_num."','".$address."');";
        $result = $db->query($sql);
    }
    $db->close();
}
?>


