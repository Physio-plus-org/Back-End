<?php
    session_start();
    $json = file_get_contents('php://input');

    

    $request = json_decode($json);
    // echo $request->patient_id;
    // echo $request->physio_center;
    // echo $request->requestedDate;
    // echo $request->status;


    $host = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "physio_plus";
    $dbh = mysqli_connect($host, $uname, $pass) or die("cannot connect");
    $dbh->set_charset("utf8");

    mysqli_select_db($dbh, $dbname);
    

    $id = rand(100, 999999);

    $sql = "INSERT INTO `requests` (`id`, `physio_center`, `patient_id`, `date_time`, `status`) 
            VALUES ('$id', '$request->physio_center', '$request->patient_id', '$request->requestedDate', '$request->status')";
    

    $result = mysqli_query($dbh, $sql);
    echo $request;



    mysqli_close($dbh);
?>
