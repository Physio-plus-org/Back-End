
<?php
// define variables and set to empty values
$data = array();
$namePhysio = $_POST["name"];
$addressPhysio = $_POST["address"];
$afmPhysio = $_POST["tax_id_number"];
//$passwd = $_POST["passwd"];
//$username = $_POST["username"];


// Replace with your own MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "database";
$tabname = "physio_centers";
//$psfusers = "psfusers";

session_start();

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 
 // Insert the data into the database
  $sql = "INSERT INTO $tabname (name, address, tax_id_number) VALUES ('$namePhysio', '$addressPhysio', '$afmPhysio')";
  
    if (mysqli_query($conn, $sql)) {
         echo "Data saved successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }

  //  $sql = "INSERT INTO $psfusers (username, passwd) VALUES ('$username','" . md5($passwd) . "')";
  //  if (mysqli_query($conn, $sql)) {
  //   echo "Data saved successfully";
  // } else {
  //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  //   }


// Close the database connection
mysqli_close($conn);

?>
