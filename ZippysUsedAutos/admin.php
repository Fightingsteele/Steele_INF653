<!DOCTYPE html>
<html>
<head>
    <title>Zippy Used Autos Admin</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        h1 { color: #2c3e50; }
        .admin-links { display: flex; flex-direction: column; max-width: 300px; }
        .admin-links a { margin: 10px 0; padding: 10px; background: #3498db; color: white; text-decoration: none; border-radius: 5px; text-align: center; }
        .admin-links a:hover { background: #2980b9; }
    </style>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <div class="admin-links">
        <a href="controllers/vehicles.php?admin=1">Manage Vehicles</a>
        <a href="controllers/makes.php">Manage Makes</a>
        <a href="controllers/types.php">Manage Types</a>
        <a href="controllers/classes.php">Manage Classes</a>
    </div>
</body>
</html>