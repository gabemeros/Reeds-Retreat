<?php
$servername = "localhost"; // Change this if your MySQL server is hosted elsewhere
$dbname = "gmeros"; // Your MySQL database name
$username = "gmeros"; 
$password = "5pVKqzx2";

// Create connection
$conn = new mysqli($servername, $dbname, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>