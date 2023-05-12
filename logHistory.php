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

  $output = array();
    while($row = $result->fetch_assoc()) {
        $output[] = $row;
    }

echo json_encode($output);

/*Test to see if the php gets correctly the data

 while ($row = mysqli_fetch_assoc($result)) {
    echo "first_name: " . $row["first_name"] . "<br>";
    echo "last_name: " . $row["last_name"] . "<br>";
  }
*/

 // $patients = mysqli_fetch_all($result,MYSQLI_ASSOC);

  mysqli_close($dbh);
?>