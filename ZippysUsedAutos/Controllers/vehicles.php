<?php
require_once(__DIR__ . '/../models/database.php');
require_once(__DIR__ . '/../models/vehicles_db.php');
require_once(__DIR__ . '/../models/makes_db.php');
require_once(__DIR__ . '/../models/types_db.php');
require_once(__DIR__ . '/../models/classes_db.php');

$makes = get_all_makes();
$types = get_all_types();
$classes = get_all_classes();

if (isset($_GET['delete'])) {
    delete_vehicle($_GET['delete']);
}

$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_vehicle'])) {
    $year = $_POST['year'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $make_id = $_POST['make_id'];
    $type_id = $_POST['type_id'];
    $class_id = $_POST['class_id'];
    add_vehicle($year, $make_id, $model, $type_id, $class_id, $price);
    $message = "Vehicle added successfully!";
}

$vehicles = get_vehicles();

include(__DIR__ . '/../views/admin_vehicles_list.php');
?>