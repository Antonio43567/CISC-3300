<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../database/database.php'; // Use the centralized database connection

$Name = $_POST['Name'] ?? ''; // Use the null coalescing operator to avoid undefined index notices
$email = $_POST['email'] ?? '';
$Message = $_POST['Message'] ?? '';

$con = getDatabaseConnection(); // Obtain database connection

if($con->connect_error) {
    die('Connection Failed : ' . $con->connect_error);
} else { 
    $stmt = $con->prepare("INSERT INTO Contact(name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $Name, $email, $Message);
    $stmt->execute(); 
    echo "Registration Successful!";
    $stmt->close(); 
    $con->close();
}
