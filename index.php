<?php

@include 'config.php';


// Open Connection
$database = new Database();
$db = $database->conn;
// Create Object from Student and Send it the Connection
$student = new Student($db);
$search = isset($_GET['search']) ? $_GET['search'] : null;

// إعدادات الصفحات
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$records_per_page = 5; // عدد الطلاب في كل صفحة
$from_record_num = ($records_per_page * $page) - $records_per_page;

// جلب البيانات
$result = $student->read($from_record_num, $records_per_page, $search);
$total_rows = $student->countAll($search);
$total_pages = ceil($total_rows / $records_per_page);
$num = $result->rowCount();

if ($num > 0) {
    include 'includes/header.php';
    if (isset($_GET['status']) && $_GET['status'] == 'success' or isset($_GET['status']) && $_GET['status'] == 'deleted') {
        @include 'views/messages_view.php';
    }
    include 'views/index_view.php';
    include 'includes/footer.php';
} else {
    echo 'Not Student Yet...';
}