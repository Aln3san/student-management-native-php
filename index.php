<?php

@include 'config.php';


// Open Connection
$database = new Database();
$db = $database->conn;
// Create Object from Student and Send it the Connection
$student = new Student($db);

if (isset($_GET['delete_id'])) {
    $student->id = $_GET['delete_id'];
    if ($student->delete()) {
        echo "<script>alert('Deleted Successfully!'); window.location='index.php';</script>";
    }
}
$result = $student->read();
$num = $result->rowCount();

if ($num > 0) {
include 'includes/header.php';
if(isset($_GET['status']) && $_GET['status'] == 'success' or isset($_GET['status']) && $_GET['status'] == 'deleted'){
    @include 'views/messages_view.php';
}
include 'views/index_view.php';
include 'includes/footer.php';
} else {
    echo 'Not Student Yet...';
}