<?php
require_once('database.php');

function get_all_makes() {
    global $db;
    return $db->query("SELECT * FROM makes")->fetchAll();
}

function add_make($name) {
    global $db;
    $stmt = $db->prepare("INSERT INTO makes (make_name) VALUES (:name)");
    $stmt->bindValue(':name', $name);
    $stmt->execute();
}

function delete_make($id) {
    global $db;
    $stmt = $db->prepare("DELETE FROM makes WHERE make_id = :id");
    $stmt->bindValue(':id', $id);
    $stmt->execute();
}
?>