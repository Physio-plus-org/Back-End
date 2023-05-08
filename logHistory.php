<?php
 $data = array();
 $fullname = $_GET["fullname"];
 $amka = $_GET["amka"];
 $address = $_GET["address"];
 $host="localhost";
 $uname="root";
 $pass="";
 $dbname="patient";
 $dbh = mysqli_connect($host,$uname,$pass) or die("cannot connect");
 mysqli_select_db($dbh, $dbname);
 $sql = "INSERT into dataofpatient values('" . $fullname . "','" . $amka . "','" .
$address . "')";
 echo $sql;
 mysqli_query($dbh, $sql);
 mysqli_close($dbh);
?>
