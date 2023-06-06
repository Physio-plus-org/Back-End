<?php
session_start();


$id = $_GET["id"];


// Connect Information
$host = "localhost";
$uname = "root";
$pass = "";
$dbname = "physio_plus";
$dbh = mysqli_connect($host, $uname, $pass) or die("cannot connect");
$dbh->set_charset("utf8");

mysqli_select_db($dbh, $dbname);

$sql = "UPDATE `requests` SET `status` = 'COMPLETED' WHERE `requests`.`id` = $id";
$result = mysqli_query($dbh, $sql);
echo $result;

mysqli_close($dbh);

?>