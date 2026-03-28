<?php
require_once(__DIR__ . '/../models/database.php');

$makes = $db->query("SELECT * FROM makes")->fetchAll();
$types = $db->query("SELECT * FROM types")->fetchAll();
$classes = $db->query("SELECT * FROM classes")->fetchAll();

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $year = $_POST['year'];
    $model = $_POST['model'];
    $price = $_POST['price'];
    $make_id = $_POST['make_id'];
    $type_id = $_POST['type_id'];
    $class_id = $_POST['class_id'];

    $stmt = $db->prepare("INSERT INTO vehicles (year, model, price, make_id, type_id, class_id)
                          VALUES (:year, :model, :price, :make_id, :type_id, :class_id)");
    $stmt->bindValue(':year', $year);
    $stmt->bindValue(':model', $model);
    $stmt->bindValue(':price', $price);
    $stmt->bindValue(':make_id', $make_id);
    $stmt->bindValue(':type_id', $type_id);
    $stmt->bindValue(':class_id', $class_id);
    $stmt->execute();

    $message = "Vehicle added successfully!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Vehicle</title>
</head>
<body>
<h1>Add New Vehicle</h1>

<p><?= $message ?></p>

<form method="post">
    Year: <input name="year" required><br>
    Model: <input name="model" required><br>
    Price: <input name="price" step="0.01" required><br>

    Make: 
    <select name="make_id" required>
        <?php foreach($makes as $make): ?>
            <option value="<?= $make['make_id'] ?>"><?= $make['make_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Type: 
    <select name="type_id" required>
        <?php foreach($types as $type): ?>
            <option value="<?= $type['type_id'] ?>"><?= $type['type_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    Class: 
    <select name="class_id" required>
        <?php foreach($classes as $class): ?>
            <option value="<?= $class['class_id'] ?>"><?= $class['class_name'] ?></option>
        <?php endforeach; ?>
    </select><br>

    <button type="submit">Add Vehicle</button>
</form>

<p><a href="../admin.php">Return to Admin</a></p>
</body>
</html>