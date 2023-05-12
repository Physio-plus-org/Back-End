<?php
 $data = array();
 $host="localhost";
 $uname="root";
 $pass="";
 $dbname="patients";
 
 $dbh = mysqli_connect($host,$uname,$pass) or die("cannot connect");
 mysqli_select_db($dbh, $dbname);


 $sql = "SELECT first_name, last_name FROM patients";

  $result = mysqli_query($dbh, $sql);

  
    while($row = mysqli_fetch_array($result)) {
        $output = array();
        $output['first_name'] = $row['first_name'];
        $output['last_name'] = $row['last_name'];
    }


mysqli_close($dbh);
header("Content-Type: application/json");
echo json_encode($output); 
?>