
<?php
// define variables and set to empty values
$data = array();
 $fullname = $_POST["fullname"];
 $amka = $_POST["amka"];
 $address = $_POST["address"];


// Replace with your own MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "physio";
$tabname = "patients";


session_start();

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 
 // Insert the data into the database
  $sql = "INSERT INTO $tabname (fullname,soc_sec_reg_num,address) VALUES ('$fullname','$amka','$address')";
  
    if (mysqli_query($conn, $sql)) {
         echo "Data saved successfully";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }


// Close the database connection
mysqli_close($conn);

?>
