<?php

@include 'config.php';

// Initialize database connection
$database = new Database();
$db = $database->conn;
// Initialize Student object
$student = new Student($db);

// 1. Get the ID of the student to be edited from the URL
if (isset($_GET['id'])) {
    $student->id = $_GET['id'];

    // Fetch current student details to populate the form
    $student->read_single();
} else {
    die('Error: Student ID not found.');
}

// 2. Process the update only when the form is submitted (POST request)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Assign submitted values to the student object properties
    $student->id = $_POST['id'];
    $student->name = $_POST['name'];
    $student->email = $_POST['email'];
    $student->progress = $_POST['progress']; // Make sure property name matches your Class

    // Execute the update method
    if ($student->update()) {
        // PHP Way to Redirect
        header("Location: index.php?status=success");
        exit();
    }
}
include 'includes/header.php';
include 'views/edit_view.php';
include 'includes/footer.php';
