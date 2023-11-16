<?php
require_once('database.php');

function add_bread_manager($email, $password, $firstName, $lastName) {
    $db = getDB(); 
    $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO breadManagers (emailAddress, password, firstName, lastName)
                  VALUES (:email, :password, :firstName, :lastName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $row = $statement->fetch();
        $statement->execute();
        $statement->closeCursor();
        
        return true; 
        if ($row === false){
            return false;
        } else{
            $hash = $row ['password'];
            return password_verify ($password, $hash);
        }
    
  
}
?>
