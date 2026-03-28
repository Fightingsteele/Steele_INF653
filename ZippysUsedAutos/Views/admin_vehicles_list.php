<!DOCTYPE html>
<html>
<head>
    <title>Admin Vehicles</title>
</head>
<body>
<h1>Admin Vehicles</h1>

<p style="color:green;"><?= $message ?></p>

<h2>Add Vehicle</h2>
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

    <button type="submit" name="add_vehicle">Add Vehicle</button>
</form>

<h2>All Vehicles</h2>
<table border="1">
<tr>
    <th>Year</th><th>Make</th><th>Model</th><th>Type</th><th>Class</th><th>Price</th><th>Action</th>
</tr>
<?php foreach($vehicles as $v): ?>
<tr>
    <td><?= $v['year'] ?></td>
    <td><?= $v['make_name'] ?></td>
    <td><?= $v['model'] ?></td>
    <td><?= $v['type_name'] ?></td>
    <td><?= $v['class_name'] ?></td>
    <td>$<?= number_format($v['price'],2) ?></td>
    <td>
        <a href="?delete=<?= $v['vehicle_id'] ?>" onclick="return confirm('Delete?')">Delete</a>
    </td>
</tr>
<?php endforeach; ?>
</table>

<p><a href="../admin.php">Return to Admin Dashboard</a></p>
</body>
</html>