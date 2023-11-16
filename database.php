<?php
$error_message = '';
function getDB(){
    $local_dsn = 'mysql:host=localhost;port=3306;dbname=my_guitar_shop1';
    $local_username = "mgs_user";
    $local_password = "pa55word";

    $njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=sa375';
    $njit_username = "sa375";
    $njit_password = "Password12345!@#$%";

    $dsn = $njit_dsn;
    $username = $njit_username;
    $password = $njit_password;

    try {
        $db = new PDO ($dsn, $username, $password);
    } catch (PDOException $exception){
        $error_message = $exception->getMessage();
        include('database_error.php');
        exit();
    }
    return $db;
}
?>