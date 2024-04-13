<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

    $Name = $_POST['Name'];
    $email = $_POST['email'];
    $Message = $_POST['Message'];

    // database connection 

    $con = new mysqli('localhost', 'root', 'root', 'Final Project'); 
    if($con->connect_error)
    {
        die('conection Failed : ' .$con->connect_error);

    }
    else{ 
        $stmt = $con->prepare("insert into Contact(name, email, message)
        values(?, ?, ?)");
    
    $stmt->bind_param("sss", $Name, $email, $Message);
    $stmt->execute(); 
    echo "registration Successful! ";
    $stmt->close(); 
    $con->close();
    }
