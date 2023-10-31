<?php
print_r($_post);

$category_id = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$code = filter_input(INPUT_POST, 'code');
$name = filter_input(INPUT_POST, 'name');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);






if($category_id == NULL || $category_id == FALSE || $code ==NULL || $name == NULL || $price == NULL || $price == FALSE){
    $error = "Invalid product data. Check all fields and try again."
    echo "$error<br>";
} else {
    require_once ('database.php');
    //slide 42
    $query = "INSERT INTO products  (categoryID, productCode, productName, listPrice)
    VALUES
    (:category_id, :code, :name, :price)";
    $statement  = db->prepare($query);
    $statement->bindvalue (':category_id', $category_id);
    $statement->bindvalue (':code', $code);
    $statement->bindvalue (':name', $name);
    $statement->bindvalue (':price', $price);
    $statement->execute;
    $statement->closeCursor();

}