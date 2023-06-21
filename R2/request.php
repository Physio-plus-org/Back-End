<?php
    require("../Utils/dbconnection.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $description = $_POST["description"];
        $code = $_POST["code"];
        $cost = $_POST["cost"];  
        $tablename = "services";
        $db = new DBConnection();
        if ($db->connect()) {
            // Check if code already exists in the database
            $checkQuery = "SELECT * FROM $tablename WHERE code = '$code'";
            $result = $db->query($checkQuery);

            if ($result->num_rows > 0) {
                // Code already exists in the database
                echo "Code already exists";
            } else {
                // Insert the data into the database
                $sql = 'INSERT INTO services (title, description, code, cost) VALUES ("'.$title.'", "'.$description.'", "'.$code.'", '.$cost.')';
                $result = $db->query($sql);
            }
            $db->close();
        }    
    }
?>
