
<?php
// define variables and set to empty values
$data = array();
$namePhysio = $_POST["name"];
$addressPhysio = $_POST["address"];
$afmPhysio = $_POST["tax_id_number"];



// Replace with your own MySQL database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "physio";
$tabname = "physio_centers";

session_start();

// Create a connection to the database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
 
// Check if tax ID number already exists in the database
$checkQuery = "SELECT * FROM $tabname WHERE tax_id_number = '$afmPhysio'";
$result = mysqli_query($conn, $checkQuery);

if (mysqli_num_rows($result) > 0) {
    // Tax ID number already exists in the database
    echo "Tax ID number already exists";
} else {
    // Insert the data into the database
    $insertQuery = "INSERT INTO $tabname (tax_id_number, name, address) VALUES ('$afmPhysio', '$namePhysio', '$addressPhysio')";
  
    if (mysqli_query($conn, $insertQuery)) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);

?>
