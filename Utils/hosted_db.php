<?php
require('./dbconnection.php');

$db = new DBConnection();
if($db->connect()) {
    $db->show();
    $db->close();
}
?>