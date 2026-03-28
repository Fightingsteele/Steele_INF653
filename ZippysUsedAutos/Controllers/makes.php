<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/makes_db.php');

$message = '';

if (isset($_GET['delete'])) {
    delete_make($_GET['delete']);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_make'])) {
    add_make($_POST['make_name']);
    $message = "Make added successfully!";
}

$makes = get_all_makes();

include(__DIR__ . '/../views/admin_makes_list.php');
?>