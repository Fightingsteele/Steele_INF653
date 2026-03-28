<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/classes_db.php');

$message = '';

if (isset($_GET['delete'])) delete_class($_GET['delete']);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_class'])) {
    add_class($_POST['class_name']);
    $message = "Class added successfully!";
}

$classes = get_all_classes();
include(__DIR__ . '/../views/admin_classes_list.php');
?>