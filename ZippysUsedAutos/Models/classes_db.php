<?php
require_once('database.php');

function get_all_classes() {
    global $db;
    return $db->query("SELECT * FROM classes")->fetchAll();
}

function add_class($name) {
    global $db;
    $stmt = $db->prepare("INSERT INTO classes (class_name) VALUES (:name)");
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_class($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM classes WHERE class_id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
?>