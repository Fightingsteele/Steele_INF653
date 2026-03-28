<?php
require_once('database.php');

function get_vehicles($make_id = '', $type_id = '', $class_id = '', $sort = 'price') {
    global $db;

    $sql = "SELECT vehicles.*, 
                   makes.make_name, 
                   types.type_name, 
                   classes.class_name
            FROM vehicles
            JOIN makes ON vehicles.make_id = makes.make_id
            JOIN types ON vehicles.type_id = types.type_id
            JOIN classes ON vehicles.class_id = classes.class_id";

    $conditions = [];
    $params = [];

    if ($make_id != '') {
        $conditions[] = "vehicles.make_id = :make_id";
        $params[':make_id'] = $make_id;
    }

    if ($type_id != '') {
        $conditions[] = "vehicles.type_id = :type_id";
        $params[':type_id'] = $type_id;
    }

    if ($class_id != '') {
        $conditions[] = "vehicles.class_id = :class_id";
        $params[':class_id'] = $class_id;
    }

    if (!empty($conditions)) {
        $sql .= " WHERE " . implode(" AND ", $conditions);
    }

    if ($sort == 'year') {
        $sql .= " ORDER BY vehicles.year DESC";
    } else {
        $sql .= " ORDER BY vehicles.price DESC";
    }

    $stmt = $db->prepare($sql);

    foreach ($params as $key => $value) {
        $stmt->bindValue($key, $value);
    }

    $stmt->execute();
    return $stmt->fetchAll();
}

function add_vehicle($year, $make_id, $model, $type_id, $class_id, $price) {
    global $db;

    $stmt = $db->prepare("
        INSERT INTO vehicles 
        (year, make_id, model, type_id, class_id, price)
        VALUES 
        (:year, :make_id, :model, :type_id, :class_id, :price)
    ");

    $stmt->bindValue(':year', $year);
    $stmt->bindValue(':make_id', $make_id);
    $stmt->bindValue(':model', $model);
    $stmt->bindValue(':type_id', $type_id);
    $stmt->bindValue(':class_id', $class_id);
    $stmt->bindValue(':price', $price);

    $stmt->execute();
}

function delete_vehicle($vehicle_id) {
    global $db;

    $stmt = $db->prepare("DELETE FROM vehicles WHERE vehicle_id = :vehicle_id");
    $stmt->bindValue(':vehicle_id', $vehicle_id);
    $stmt->execute();
}
?>