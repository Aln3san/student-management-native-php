<?php
// 1. Use the Autoload (Trait or file)
@include 'config.php';

// 2. Initialize Database and Student object
$database = new Database();
$db = $database->conn;
$student = new Student($db);

// 3. Get ID from URL
if (isset($_GET['id'])) {
    $student->id = $_GET['id'];

    // 4. Execute Delete
    if ($student->delete()) {
        // Redirect back to index with a success flag
        header("Location: index.php?status=deleted");
        exit();
    } else {
        die("Error: Unable to delete student.");
    }
} else {
    die("Error: ID not found.");
}