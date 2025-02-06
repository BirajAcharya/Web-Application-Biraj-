<?php
$host = "localhost";
$dbname = "Africanviolet";
$username = "root";
$password = "";

// Create connection
$mysqli = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
echo "Connected successfully!";
?>
