<?php
// database.php: Database connection setup

function getDatabaseConnection() {
    $host = "localhost";
    $username = "root";
    $password = "root";
    $database = "Final Project";

    $con = mysqli_connect($host, $username, $password, $database);
    if (!$con) {
        die("Connection Error: " . mysqli_connect_error());
    }
    return $con;
}
