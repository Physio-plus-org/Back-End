<?php
    require("../Utils/dbconnection.php");
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST["title"];
        $description = $$title = $_POST["description"];
        $code = $$title = $_POST["code"];
        $cost = $$title = $_POST["cost"];
        $db = new DBConnection();
        if ($db->connect()) {
            $sql = 'INSERT INTO services (title, description, code, cost) VALUES ("'.$title.'", "'.$description.'", "'.$code.'", '.$cost.')';
            $result = mysqli_query($conn, $sql);
        }
        $db->close();
    }    
?>
