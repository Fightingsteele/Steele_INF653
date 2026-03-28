<h1>Admin Classes</h1>
<p style="color:green;"><?= $message ?></p>

<form method="post">
    Add Class: <input name="class_name" required>
    <button type="submit" name="add_class">Add</button>
</form>

<h2>All Classes</h2>
<ul>
<?php foreach($classes as $c): ?>
    <li><?= $c['class_name'] ?> 
        <a href="?delete=<?= $c['class_id'] ?>" onclick="return confirm('Delete?')">Delete</a>
    </li>
<?php endforeach; ?>
</ul>

<p><a href="../admin.php">Return to Admin Dashboard</a></p>