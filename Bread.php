<?php
require_once('database.php');

$breadCategoryID = filter_input(INPUT_GET, 'breadCategoryID', FILTER_VALIDATE_INT);

if ($breadCategoryID == NULL || $breadCategoryID == FALSE){
    $breadCategoryID = 1; 
}

$query = 'SELECT breadCode, breadName, description, price 
FROM bread 
WHERE breadCategoryID = :breadCategoryID';

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

      </nav>
<main>
    <h1>Taskin Menu</h1>
    <aside>
        <h2>Categories</h2>
        <nav>
            <ul class="no-bullets">
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
                </tr>
            <?php endforeach; ?>
        </table>
    </section>
</main>
<?php include ('footer.php'); ?>
</body>
</html>
