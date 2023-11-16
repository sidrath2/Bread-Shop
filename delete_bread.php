<?php
require_once('database.php');

$breadID = filter_input(INPUT_POST, 'breadID', FILTER_VALIDATE_INT);

if ($breadID !== false) {
    $query = 'DELETE FROM bread WHERE breadID = :breadID';  
    $db = getDB(); 
    $statement = $db->prepare($query);
    $statement->bindValue(':breadID', $breadID);
    $statement->execute();
    $statement->closeCursor();
}

header('Location: bread.php');
exit();
?>
