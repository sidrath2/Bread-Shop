<?php
require_once('database.php');
$breadID = filter_input(INPUT_GET, 'bread_id', FILTER_VALIDATE_INT);

$query = 'SELECT * FROM bread WHERE breadID = :breadID';
$db = getDB();
$statement = $db->prepare($query);
$statement->bindValue(':breadID', $breadID);
$statement->execute();
$bread = $statement->fetch();
$statement->closeCursor();
?>


<html>
<head>
    <title>Menu Details</title>
    <meta name="description" content="Explore the delicious bread menu at Taskin Bakery.">
    <link rel = "stylesheet" href = "style.css">
</head>
<body>
<?php include('header.php'); ?>
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
<main>
    <h1>Bread Details</h1>
    <p>Bread Code: <?php echo $bread['breadCode']; ?></p>
    <p>Bread Name: <?php echo $bread['breadName']; ?></p>
    <p>Description: <?php echo $bread['description']; ?></p>
    <p>Price: <?php echo $bread['price']; ?></p>
    <?php
    $image = $bread['breadCode'] . "-bw.jpg";
    echo '<img id="breadImage" src="' . $image . '" width = "320"
    height = "212" alt="Bread Image">';
    ?>
</main>
<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
        <script src = "rollover.js"></script>
<?php include('footer.php'); ?>
</body>
</html>
