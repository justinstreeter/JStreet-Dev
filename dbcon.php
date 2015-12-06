<?php
$servername = "localhost";
$username = "root";
$password = "";
$message = "";
try {
    $conn = new PDO("mysql:host=$servername;dbname=project", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   // $message = "Connected successfully"; 
    }
catch(PDOException $e)
    {
    //$message = "Connection failed: " . $e->getMessage();
    }
?>