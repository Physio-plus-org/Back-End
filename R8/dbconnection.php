<?php 
class DBConnection {
    private $hostName;
    private $userName;
    private $password;
    private $dbName;
    private $connection;
    
    function __construct($host="localhost", $user="root", $pass="", $db="physio_plus") {
        $this->hostName = $host;
        $this->userName = $user;
        $this->password = $pass;
        $this->dbName = $db;
    }

    function connect() {
        $this->connection= new mysqli($this->hostName,$this->userName,$this->password,$this->dbName);
        return $this->connection;
    }

    function query($sql) {
        return $this->connection->query($sql);
    }
}
?>