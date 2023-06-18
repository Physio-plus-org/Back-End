<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "physio_plus";
    
    $conn = new mysqli($host, $username, $password, $dbname);
    if (!$conn) {
         die("Connection failed: " . $conn->connect_error);
    }

    $title = $_POST["title"];
    $description = $$title = $_POST["desc"];
    $code = $$title = $_POST["code"];
    $cost = $$title = $_POST["cost"];
    echo $title." ". $description ." ". $code . " " . $cost;
    $sql = 'INSERT INTO services (title, description, code, cost) VALUES ("'.$title.'", "'.$description.'", "'.$code.'", '.$cost.')';
    $result = mysqli_query($conn, $sql);
?>
