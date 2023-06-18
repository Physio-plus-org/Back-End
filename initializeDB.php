<?php
require('../Utils/database.php');

function generateRandomString($length = 25) {
   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $charactersLength = strlen($characters);
   $randomString = '';
   for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
   }
   return $randomString;
}
 $db = new DBConnection();
 if($db->connect()){
    echo "connected";
 }else{
    echo "not connected";
 }
 $db->close();
//  $ids = array();
//  for( $i = 0; $i < 10; $i++) {
//    $id = rand(1000, 9999) . rand(1000, 9999) . rand(1000, 9999);
//    $fname = generateRandomString(4);
//    $lname = generateRandomString(4);
//    $act = $i;
//    $ids[$id] = $fname.",".$lname.",".$act;
//    echo $id . $ids[$id] ."<br>";
//  }
//  foreach ( $ids as $id=>$value) {
//    $split = explode(",", $value);
//    $query = "INSERT INTO patients (personal_number, first_name, last_name, actions) VALUES ('".$id."','".$split[0]."','".$split[1]."','".$split[2]."');";
//    try {
//       $conn->prepare($query)->execute();
//    } catch (Exception $e) {
//      echo "Error executing query. Information: ".$e->getMessage();
//    }
//  }
  ?>