<?php
 $data = array();
 $FullName = $_GET["FullName"];
 $email = $_GET["email"];
 $AMKA = $_GET["AMKA"];
 $host="localhost";
 $uname="root";
 $pass="";
 $dbname="physio";
 $dbh = mysqli_connect($host,$uname,$pass) or die("cannot connect");
 mysqli_select_db($dbh, $dbname);
 $sql = "INSERT into xrhstes values('" . $FullName . "','" . $email . "','" .
$AMKA . "')";
 echo $sql;
 mysqli_query($dbh, $sql);
 mysqli_close($dbh);
?>