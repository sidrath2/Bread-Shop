<?php

function double($db, $breadCode) {
    $query = 'SELECT COUNT(*) FROM bread WHERE breadCode = :breadCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':breadCode', $breadCode);
    $statement->execute();
    $check = $statement->fetchColumn();
    $statement->closeCursor();
    return $check > 0;
}

require_once('database.php');
$db = getDB(); 

$breadCategoryID = filter_input(INPUT_POST, 'breadCategoryID', FILTER_VALIDATE_INT);
$breadCode = filter_input(INPUT_POST, 'code');
$breadDescription = filter_input(INPUT_POST, 'description');
$breadName = filter_input(INPUT_POST, 'name');
$breadPrice = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);

if ($breadCategoryID === null || $breadCategoryID === false || $breadCode === null || $breadCode === false || $breadName === null || $breadPrice === null || $breadPrice === false) {
    $error = "Invalid bread data";
    echo "$error<br>";
} else {
    if (double($db, $breadCode)) {
        $error = "Bread code '$breadCode' already exists.";
        echo "$error<br>";
    } else {
        $query = "INSERT INTO bread (breadCategoryID, breadCode, breadName, description, price, dateAdded) VALUES (:breadCategoryID, :breadCode, :breadName, :breadDescription, :breadPrice, NOW())";
        $statement = $db->prepare($query);
        $statement->bindValue(':breadCategoryID', $breadCategoryID);
        $statement->bindValue(':breadCode', $breadCode);
        $statement->bindValue(':breadName', $breadName);
        $statement->bindValue(':breadDescription', $breadDescription);
        $statement->bindValue(':breadPrice', $breadPrice);
        $statement->execute();
        $statement->closeCursor();
    }
}
?>

<html>
<head>
    <title>Taskin Bakery & Cafe Since 1997</title>
    <meta name="description" content="Explore the delicious bread menu at Taskin Bakery.">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include('header.php'); ?>
<nav>
    <!-- Navigating from one page to the other -->
    <a href="./index.php">Home</a>
    <a href="./shipping.html">Shipping Form</a>
    <a href="./bread.php">Menu</a>
    <a href="./map.html">Map</a>
    <a href="./create.php">Bread Manager</a>
</nav>

<main>
    <h3>Thank you for adding a new Bread</h3>
    <h4>What did one slice of bread say to the other before the race? You're toast!</h4>
</main>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<?php include('footer.php'); ?>
</body>
</html>
