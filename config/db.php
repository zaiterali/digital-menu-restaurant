<?php

$host = 'localhost';
$user = 'root';
$pass = '';
$db = '';

$conn = mysqli_connect($host, $user, $pass, $db);

// Create Connection
$conn = mysqli_connect($host, $user, $pass, $db);
// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
