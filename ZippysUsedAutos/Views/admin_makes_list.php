<h1>Admin Makes</h1>
<p style="color:green;"><?= $message ?></p>

<form method="post">
    Add Make: <input name="make_name" required>
    <button type="submit" name="add_make">Add</button>
</form>

<h2>All Makes</h2>
<ul>
<?php foreach($makes as $m): ?>
    <li><?= $m['make_name'] ?> 
        <a href="?delete=<?= $m['make_id'] ?>" onclick="return confirm('Delete?')">Delete</a>
    </li>
<?php endforeach; ?>
</ul>

<p><a href="../admin.php">Return to Admin Dashboard</a></p>