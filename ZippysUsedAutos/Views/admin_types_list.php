<h1>Admin Types</h1>
<p style="color:green;"><?= $message ?></p>

<form method="post">
    Add Type: <input name="type_name" required>
    <button type="submit" name="add_type">Add</button>
</form>

<h2>All Types</h2>
<ul>
<?php foreach($types as $t): ?>
    <li><?= $t['type_name'] ?> 
        <a href="?delete=<?= $t['type_id'] ?>" onclick="return confirm('Delete?')">Delete</a>
    </li>
<?php endforeach; ?>
</ul>

<p><a href="../admin.php">Return to Admin Dashboard</a></p>