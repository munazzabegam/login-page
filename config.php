<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new mysqli("localhost", "root", "", "loginpage");

if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
?>