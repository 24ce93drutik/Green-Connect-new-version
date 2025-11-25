<?php
$servername = "localhost";   // usually localhost
$username = "root";          // your MySQL username
$password = "";              // your MySQL password
$dbname = "green_connect"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 else {
echo "we r connected";
 }   

?>