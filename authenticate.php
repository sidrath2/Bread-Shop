<?php
require_once('database.php');

function validate_login($email, $password) {
    $db = getDB();

    $query = 'SELECT * FROM breadManagers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);
    $statement->closeCursor();

    if ($user && password_verify($password, $user['password'])) {
        return array('success' => true, 'firstName' => $user['firstName'], 'lastName' => $user['lastName'], 'emailAddress' => $user['emailAddress']);
    } else {
        return array('success' => false, 'message' => 'Invalid credentials.');
    }
}
?>
