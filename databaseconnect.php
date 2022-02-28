<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "TaskManager";

// !! changes for my own database, comment these out please !!

$servername = "localhost";
$username = "task_manager";
$password = "LP607@)oXBZ]FGaI";
$database = "task_manager";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


// Connected successfully
