<?php

require_once('database.php');

$query = 'SELECT * FROM breadCategories ORDER BY breadCategoryID';
$db = getDB(); 
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
<div id="login-logout">
            <?php
            session_start();
            if (isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']) {
                $firstName = $_SESSION['firstName'];
                $lastName = $_SESSION['lastName'];
                $emailAddress = $_SESSION['emailAddress'];
                echo "Welcome, $firstName $lastName ($emailAddress)!  | <a href='logout.php'>Logout</a>";
            } else {
                echo "<a href='login.php'>Login</a>";
            }
            ?>
        </div>
<?php include ('header.php'); ?>
<nav>
        <!--Navigating from one page to the other-->
        <a href="./index.php">Home</a>
        <a href="./bread.php">Menu</a>
        <a href="./map.html">Map</a>
        <?php
            if (isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']) {
                echo '<a href="./shipping.php">Shipping Form</a>';
                echo ' ';
                echo '<a href="./create.php">Bread Manager</a>';
            }
            ?>
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
