<?php
require('./Utils/database.php');

 $db = new DBConnection();
 if($db->connect()){
    echo "connected";
    $db->show();
 }else{
    echo "not connected";
 }
 $db->close();
  ?>