<?php
 $data = array();
 $host="localhost";
 $uname="root";
 $pass="";
 $dbname="patients";
 
 $dbh = mysqli_connect($host,$uname,$pass) or die("cannot connect");
 mysqli_select_db($dbh, $dbname);

 $sql = "SELECT brand, GROUP_CONCAT(model) AS grouped_models,
GROUP_CONCAT(image) as images FROM models GROUP BY brand";

 $sql = "SELECT  GROUP_CONCAT(first_name) AS FirstNames , GROUP_CONCAT(last_name) AS LastNames FROM patients";

  $result = mysqli_query($dbh, $sql);

  
    while($row = mysqli_fetch_array($result)) {
        $output = array();
        $output['FirstNames'] = $row['FirstNames'];
        $output['LastNames'] = $row['LastNames'];
    }


mysqli_close($dbh);
header("Content-Type: application/json");
echo json_encode($output); 
?>