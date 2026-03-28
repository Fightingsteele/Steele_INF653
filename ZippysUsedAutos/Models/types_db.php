<?php
require_once('database.php');

function get_all_types() {
    global $db;
    return $db->query("SELECT * FROM types")->fetchAll();
}

function add_type($name) {
    global $db;
    $stmt = $db->prepare("INSERT INTO types (type_name) VALUES (:name)");
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_type($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM types WHERE type_id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
?>