<?php
require_once('database.php');

$category_id = filter_input (INPUT_GET, 'category_id', FILTER_VALIDATE_INT);

if ($category_id == NULL || $category_id == FALSE){
    $category_id = 1;
}


//get name for selected category

$query = 'SELECT breadCategoryName, breadCode, breadName, description, price 
FROM bread, breadCategories 
WHERE breadID = :category_id';
$statement1 = $db->prepare ($query);
$statement1->bindValue (':category_id', $category_id);
$statement1->execute();
$category = $statement1->fetch();
$category_name = $category['breadCategoryName'];
$statement1->closeCursor();




$queryAllCategories = 'SELECT * FROM breadCategoryName ORDER BY breadID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

?>

<html>
<head>
    <title>Bread Shop</title>
</head>
<body>
<main>
    <h1>Breads</h1>
    <aside>
        <h2>Categories</h2>
        <nav>
            <ul>
                <?php foreach($breadCategories as  $breadCategory): ?>
                    <li>
                        <a href="?category_id=<?php echo $category['categoryID']; ?>">
                        <?php echo $category['categoryName']; ?></a>
                    </li>
                    <?php endforeach; ?>
            </ul>
        </nav>

    </aside>


<section>
    <h2><?php echo $category_name; ?></h2>
    <table>
        <tr>
            <th>Bread Code </th>
            <th>Bread Name</th>
            <th>Bread Price</th>
        </tr>
        <?php foreach ($products as $product) : ?>
            <tr>
                <td><?php echo $product['breadCode']; ?> </td>
                <td><?php echo $product['breadCategoryName']; ?> </td>
                <td><?php echo $product['price']; ?> </td>
                
            </tr>
        <?php endforeach; ?>
    </table>
</section>
</main>
</body>

</html>


