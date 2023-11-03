<?php

require_once('database.php');

$query = 'SELECT * FROM breadCategories ORDER BY breadCategoryID';
$statement = $db->prepare($query); 
$statement->execute();
$breadCategories = $statement->fetchAll(); 
$statement->closeCursor();
?>





<html>
<head>
    <title>Taskin Bakery & Cafe Since 1997</title>
    <meta name="description" content="Explore the delicious bread menu at Taskin Bakery.">
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
<?php include ('header.php'); ?>
<nav>
        <!--Navigating from one page to the other-->
        <a href="./index.php">Home</a>
        <a href="./shipping.html">Shipping Form</a>
        <a href="./bread.php">Menu</a>
        <a href="./map.html">Map</a>
        <a href="./create.php">Bread Manager</a>
      </nav>
<h1>Bread Manager</h1>
<main>
    <form action="add_bread.php" method="post">
        <label>Bread Category:</label>
        <select name="breadCategoryID">
            <?php foreach ($breadCategories as $breadCategory): ?>
                <option value="<?php echo $breadCategory['breadCategoryID']; ?>">
                    <?php echo $breadCategory['breadCategoryName']; ?> 
                </option>
            <?php endforeach; ?>
        </select>
        <br>
        <label>Bread Code:</label>
        <input type="text" name="code">
        <br>
        <label>Bread Name:</label>
        <input type="text" name="name">
        <br>
        <label>Bread Description:</label>
        <input type="text" name="description"> 
        <br>
        <label>Bread Price:</label> 
        <input type="text" name="price">
        <br>
        <input type="submit" value="Add Bread">
    </form>
</main>
</body>
</html>
