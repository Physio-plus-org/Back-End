
<?php
// Requirements
require("../Utils/dbconnection.php");

// define variables and set to empty values
$data = array();
$namePhysio = $_POST["name"];
$addressPhysio = $_POST["address"];
$afmPhysio = $_POST["tax_id_number"];
$tabname = "physio_centers";

// Create a connection to the database
$db = new DBConnection();
$db->connect();
 
// Check if tax ID number already exists in the database
$checkQuery = "SELECT * FROM $tabname WHERE tax_id_number = '$afmPhysio'";
$result = $db->query($checkQuery);

if ($result->num_rows > 0) {
    // Tax ID number already exists in the database
    echo "Tax ID number already exists";
} else {
    // Insert the data into the database
    $insertQuery = "INSERT INTO $tabname (tax_id_number, name, address) VALUES ('$afmPhysio', '$namePhysio', '$addressPhysio')";
  
    if ($db->query($insertQuery)) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $db->error();
    }
}

// Close the database connection
$db->close();

?>
