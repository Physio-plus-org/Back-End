<?php
 require('../Utils/dbconnection.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Pssrn = $_POST["ssrn"];
    $db = new DBConnection();

    if($db->connect()){
     $sql = "SELECT * FROM patients WHERE ssrn='$Pssrn'";
     $result = $db->query($sql);
  
    if ($result->num_rows > 0) {
      $row = $result -> fetch_assoc();
      $json = json_encode($row);
      echo $json;
     }
  }
  else{
    echo "Not connected";
 }
    $db->close();
}
?>
