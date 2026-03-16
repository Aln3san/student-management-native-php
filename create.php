<?php

@include 'config.php';

// Initialize database connection
$database = new Database();
$db = $database->conn;
// Initialize Student object
$student = new Student($db);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Assign submitted values to the student object properties
    $student->name = $_POST['name'];
    $student->email = $_POST['email'];
    $student->progress = $_POST['progress']; // Make sure property name matches your Class

    // Execute the update method
    if ($student->create()) {
        // PHP Way to Redirect
        header("Location: index.php?status=success");
        exit();
    }
}

include 'includes/header.php';
include 'views/create_view.php';
include 'includes/footer.php';
