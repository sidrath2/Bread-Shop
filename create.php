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
    <form id="BreadManager" action="add_bread.php" method="post" onsubmit="return validate()">
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
        <input type="button" value="Reset" onclick="reset()">
        <input type="submit" value="Add Bread">
    </form>
</main>
<script>
    function reset() {
        document('#BreadManager').reset();
    }
    function validate() {
        var breadCode = document.forms["BreadManager"]["code"].value;
        var breadName = document.forms["BreadManager"]["name"].value;
        var breadDescription = document.forms["BreadManager"]["description"].value;
        var breadPrice = document.forms["BreadManager"]["price"].value;

        if (breadCode == "" || breadCode.length < 4 || breadCode.length > 10) {
            alert("Should not be blank and length should be between 4 to 10 characters");
            return false;
        }

        if (breadName == "" || breadName.length < 10 || breadName.length > 100) {
            alert("Should not be blank and length should be between 10 and 100 characters");
            return false;
        }

        if (breadDescription == "" || breadDescription.length < 10 || breadDescription.length > 255) {
            alert("Should not be blank and length should be between between 10 and 255 characters");
            return false;
        }

        var priceNum = parseFloat(breadPrice);
        if (isNaN(priceNum) || breadPrice == "" || priceNum <= 0 || priceNum > 100000) {
            alert("Should not be blank, should be a positive number, and should not exceed $100000");
            return false;
        }
        return true;
    }
</script>

<?php include ('footer.php'); ?> <!--Calling the Footer section-->
</body>
</html>
