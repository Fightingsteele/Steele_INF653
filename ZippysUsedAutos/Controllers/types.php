<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/types_db.php');

$message = '';

if (isset($_GET['delete'])) delete_type($_GET['delete']);
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_type'])) {
    add_type($_POST['type_name']);
    $message = "Type added successfully!";
}

$types = get_all_types();
include(__DIR__ . '/../views/admin_types_list.php');
?>