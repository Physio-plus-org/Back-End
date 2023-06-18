<?php
 $output = array();
 $host="localhost";
 $uname="root";
 $pass="";
 $dbname="patients";
 
 $dbh = mysqli_connect($host,$uname,$pass) or die("cannot connect");
 mysqli_select_db($dbh, $dbname);

 $sql = "SELECT * FROM patients";

  $result = mysqli_query($dbh, $sql);

  if ($result->num_rows > 0) {
    while($row = $result -> fetch_assoc()) {
        $output[] = $row;    
    }

    $json = json_encode($output);
    echo $json;
}

   
mysqli_close($dbh);
header("Content-Type: application/json");
 
?>
