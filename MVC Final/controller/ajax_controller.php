<?php
// ajax_controller.php: Handles AJAX requests for project data

require_once 'models/model.php'; // Include the model for database interactions

header('Content-Type: application/json');  // Set proper header for JSON response

// Function to fetch projects from the model
function fetchProjects($id = null) {
    return getProjects($id); // Call to the model function
}

// Determine which project data to fetch based on the presence of an 'id' parameter
if (isset($_GET['id'])) {
    echo json_encode(fetchProjects(intval($_GET['id'])));
} else {
    echo json_encode(fetchProjects());
}
exit;  // Ensure no further script execution
