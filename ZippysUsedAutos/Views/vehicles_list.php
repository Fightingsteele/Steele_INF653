<h1>Zippy Used Autos</h1>

<form method="get">

    Sort:
    <select name="sort">
        <option value="price" <?= $sort == 'price' ? 'selected' : '' ?>>Price</option>
        <option value="year" <?= $sort == 'year' ? 'selected' : '' ?>>Year</option>
    </select>

    Make:
    <select name="make_id">
        <option value="">All Makes</option>
        <?php foreach($makes as $make): ?>
            <option value="<?= $make['make_id'] ?>" <?= $make_id == $make['make_id'] ? 'selected' : '' ?>>
                <?= $make['make_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    Type:
    <select name="type_id">
        <option value="">All Types</option>
        <?php foreach($types as $type): ?>
            <option value="<?= $type['type_id'] ?>" <?= $type_id == $type['type_id'] ? 'selected' : '' ?>>
                <?= $type['type_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    Class:
    <select name="class_id">
        <option value="">All Classes</option>
        <?php foreach($classes as $class): ?>
            <option value="<?= $class['class_id'] ?>" <?= $class_id == $class['class_id'] ? 'selected' : '' ?>>
                <?= $class['class_name'] ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Apply Filters</button>
</form>

<table border="1">
<tr><th>Year</th><th>Make</th><th>Model</th><th>Type</th><th>Class</th><th>Price</th></tr>
<?php foreach($vehicles as $v): ?>
<tr>
    <td><?= $v['year'] ?></td>
    <td><?= $v['make_name'] ?></td>
    <td><?= $v['model'] ?></td>
    <td><?= $v['type_name'] ?></td>
    <td><?= $v['class_name'] ?></td>
    <td>$<?= number_format($v['price'],2) ?></td>
</tr>
<?php endforeach; ?>
</table>