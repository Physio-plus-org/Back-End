<?php
 require('../Utils/dbconnection.php');

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Psysioid = $_POST["tax_id_number"];
    $db = new DBConnection();

    if($db->connect()){
     $sql = "SELECT * FROM physio_centers WHERE tax_id_number='$Psysioid'";
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
