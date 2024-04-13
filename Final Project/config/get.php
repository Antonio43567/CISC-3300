<?php
   
    $con = mysqli_connect("localhost", "root", "root", "Final Project");
    if(!$con){ 
        die("Connection Error: " . mysqli_connect_error());
    }

    header('Content-Type: application/json');  

 
    if (isset($_GET['id'])) {
        $projectId = intval($_GET['id']);  
        $query = "SELECT id, name, filename, GitLink, description FROM Projects WHERE id = $projectId";
    } else {
      
        $query = "SELECT id, name, filename, GitLink, description FROM Projects ORDER BY id";
    }


    $result = mysqli_query($con, $query);

    $projects = [];
    if ($result) {
        
        while ($project = mysqli_fetch_assoc($result)) {
            $projects[] = $project;
        }
       
        echo json_encode($projects);
    } else {
       
        echo json_encode(['error' => 'Database query failed: ' . mysqli_error($con)]);
    }

 
    mysqli_close($con);
?>
