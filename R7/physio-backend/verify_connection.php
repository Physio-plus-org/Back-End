<?php


if ($db->connect()){
    $result = "success";
    echo $result;

    $database->close();
    unset($database);
}else{
    die('Failed to connect to the database: ' . $database->connect_error);
}
    
?>
