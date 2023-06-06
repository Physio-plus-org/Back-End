<?php
    session_start();
    // Default Values
    $id = 000;
    $physio_center = 000;
    $patient_id = 000;
    $date_time = '2023-01-01';
    $status = 'UPCOMING';

    class Event {
        
    }
    
    $requests = array();

    $range_start = $_GET["range_start"];
    $range_end = $_GET["range_end"];
    $status = $_GET["status"];


    // Connect Information
    $host = "localhost";
    $uname = "root";
    $pass = "";
    $dbname = "physio_plus";
    $dbh = mysqli_connect($host, $uname, $pass) or die("cannot connect");
    $dbh->set_charset("utf8");

    mysqli_select_db($dbh, $dbname);

    $sql = "SELECT *  FROM `requests` WHERE `date_time` BETWEEN '$range_start' AND '$range_end' AND `status` = '$status';";

    $result = mysqli_query($dbh, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $event = new Event();
        $event->id = $row["id"]; 
        $event->physio_center = $row["physio_center"];
        $event->patient_id = $row["patient_id"];
        $event->date_time = $row["date_time"];
        $event->status = $row['status'];
        array_push($requests, $event);
        // $requests[count($requests)] = $event;
        
    }
    mysqli_close($dbh);
    // $obj = (object)$requests;
    $encoded = json_encode($requests);
    echo $encoded;
?>