<?php
 require('../Utils/dbconnection.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $db = new DBConnection();

    if($db->connect()){
     $sql = "SELECT * FROM patients";
     $result = $db->query($sql);
  
    if ($result->num_rows > 0) {
      $output = array();
      while($row = $result -> fetch_assoc()) {
        array_push($output,$row);
      }

      $json = json_encode($output);
      echo $json;
     }
  }
  else{
    echo "Not connected";
 }
    $db->close();
}
?>
