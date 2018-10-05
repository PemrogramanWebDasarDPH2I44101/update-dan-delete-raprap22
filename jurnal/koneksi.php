<?php 

$servername = "localhost";
$database = "ta3";
$username = "root";
$pass = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
catch(PDOException $e)
    {
    echo "Gagal: " . $e->getMessage();
    }

?>