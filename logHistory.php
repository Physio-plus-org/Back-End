<?php
 $data = array();
 $host="localhost";
 $uname="root";
 $pass="";
 $dbname="patients";
 
 $dbh = mysqli_connect($host,$uname,$pass) or die("cannot connect");
 mysqli_select_db($dbh, $dbname);



 $sql = "SELECT  GROUP_CONCAT(first_name) AS FirstNames , GROUP_CONCAT(last_name) AS LastNames, GROUP_CONCAT(soc_sec_reg_num) AS AMKA FROM patients";

  $result = mysqli_query($dbh, $sql);

  
    while($row = mysqli_fetch_array($result)) {
        $output = array();
        $output['FirstNames'] = $row['FirstNames'];
        $output['LastNames'] = $row['LastNames'];
        $output['AMKA'] = $row['AMKA'];
    }


mysqli_close($dbh);
header("Content-Type: application/json");
echo json_encode($output); 
?>
