<?php
$database = new SQLite3("../databases/appointments.db"); 

if (!$database) {
  die('Failed to connect to the database');
}else{
  echo "sucessfully modified  the database";
}

//test
$database->exec("UPDATE upcomingAppoint SET date = '20/05/2023' WHERE patientName = 'krepas'");



$database->close();
unset($database);
?>

