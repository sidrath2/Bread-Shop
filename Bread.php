<?php
require_once('database.php'); //Calling on to the database

$breadCategoryID = filter_input(INPUT_GET, 'breadCategoryID', FILTER_VALIDATE_INT);

if ($breadCategoryID == NULL || $breadCategoryID == FALSE){
    $breadCategoryID = 1; 
}

$query = 'SELECT breadID, breadCode, breadName, description, price 
FROM bread 
WHERE breadCategoryID = :breadCategoryID';
$db = getDB(); 
$statement1 = $db->prepare($query);
$statement1->bindValue(':breadCategoryID', $breadCategoryID);
$statement1->execute();
$products = $statement1->fetchAll();
$statement1->closeCursor();

$queryAllCategories = 'SELECT * FROM breadCategories ORDER BY breadCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$breadCategories = $statement2->fetchAll();
$statement2->closeCursor();


$selectedCategoryName = "";
foreach ($breadCategories as $breadCategory) {
    if ($breadCategory['breadCategoryID'] == $breadCategoryID) {
        $selectedCategoryName = $breadCategory['breadCategoryName'];
        break;
    }
}
?>

<html>
<head>
    <title>Taskin Menu</title>
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
<main>
    <h1>Taskin Menu</h1>
    <aside>
        <h2>Categories</h2>
        <nav>
            <ul class = "format">
                <?php foreach($breadCategories as $breadCategory): ?>
                    <li>
                        <a href="?breadCategoryID=<?php echo $breadCategory['breadCategoryID']; ?>">
                            <?php echo $breadCategory['breadCategoryName']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <section class = "box">
        <h2><?php echo $selectedCategoryName; ?></h2>
        <table>
            <tr>
                <th>Bread Code</th>
                <th>Bread Name</th>
                <th>Bread Description</th>
                <th>Bread Price</th>
            </tr>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['breadCode']; ?></td>
                    <td><?php echo $product['breadName']; ?></td>
                    <td><?php echo $product['description']; ?></td>
                    <td><?php echo $product['price']; ?></td>
                    <?php if (isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']) { ?>
                    <td>
                        <form action="delete_bread.php" method="post">
                        <input type="hidden" name="breadID" value="<?php echo $product['breadID']; ?>">
                        <input type="submit" value="Delete">
                        </form>
                    </td>
                    <?php } ?>
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php include ('footer.php'); ?>
</body>
</html>





