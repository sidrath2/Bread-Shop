<?php

require_once('database.php');

$query = 'SELECT * FROM categories ORDER BY categoryID';
$statement = $db->prepare($query); // Use the $db connection from database.php
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<html>
<head>
    <title>Taskin Bakery & Cafe Since 1997</title>
</head>
<body>
<h1>Bread Manager</h1>
<main>
    <form action="add_bread.php" method="post">
        <label>Bread Category:</label>
        <select name="category_id">
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo $category['categoryID']; ?>">
                    <?php echo $category['categoryName']; ?>
                </option>
            <?php endforeach; ?>
        </select>
        <label>Bread Code:</label>
        <input type="text" name="code">
        <br>
        <label>Bread Name:</label>
        <input type="text" name="name">
        <br>
        <label>Bread Description:</label>
        <input type="text" name="name">
        <br>
        <label>Bread Price</label>
        <input type="text" name="price">
        <br>
        <input type="submit" value="Add Bread">
    </form>
</main>
</body>
</html>
