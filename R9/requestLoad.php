<?php
require("../Utils/dbconnection.php");
    session_start();
    $id = 000;
    $physio_center = 000;
    $patient_id = 000;
    $date_time = '2023-01-01';

    class Request {
        
    }
    
    $requests = array();

    $range_start = $_GET["range_start"];
    $range_end = $_GET["range_end"];

    $db = new DBConnection();
    if ($db->connect()) {
        $sql = "SELECT * FROM `requests` WHERE `date_time` BETWEEN '$range_start' AND '$range_end';";
        $result = mysqli_query($dbh, $sql);
        while ($row = mysqli_fetch_array($result)) {
            $request = new Request();
            $request->id = $row["id"]; 
            $request->physio_center = $row["physio_center"];
            $request->patient_id = $row["patient_id"];
            $request->date_time = $row["date_time"];
            array_push($requests, $request);
            // $requests[count($requests)] = $request;
            
        }
    }
    $db->close();
    // $host = "localhost";
    // $uname = "root";
    // $pass = "";
    // $dbname = "physio_plus";
    // $dbh = mysqli_connect($host, $uname, $pass) or die("cannot connect");
    // $dbh->set_charset("utf8");

    // mysqli_select_db($dbh, $dbname);

    // $sql = "SELECT * FROM `requests` WHERE `date_time` BETWEEN '$range_start' AND '$range_end';";
    // $result = mysqli_query($dbh, $sql);
    // while ($row = mysqli_fetch_array($result)) {
    //     $request = new Request();
    //     $request->id = $row["id"]; 
    //     $request->physio_center = $row["physio_center"];
    //     $request->patient_id = $row["patient_id"];
    //     $request->date_time = $row["date_time"];
    //     array_push($requests, $request);
    //     // $requests[count($requests)] = $request;
        
    // }
    // mysqli_close($dbh);
    // $obj = (object)$requests;
    $encoded = json_encode($requests);
    echo $encoded;
    
?>