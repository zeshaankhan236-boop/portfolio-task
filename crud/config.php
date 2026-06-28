<?php

$serverName = "localhost";
$userName   = "root";
$passWord   = "";
$database   = "crudkai_db1";

// Connection
$conn = mysqli_connect($serverName, $userName, $passWord, $database);

// Check connection
if ($conn) {
    echo "Database is connected";
} else {
    echo "Connection failed: " . mysqli_connect_error();
}

?>