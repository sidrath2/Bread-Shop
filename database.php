<?php
$njit_dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=sa375';
$njit_username = "sa375";
$njit_password = "Password12345!@#$%";

$dsn = $njit_dsn;
$username = $njit_username;
$password = $njit_password;

try {
    $db = new PDO ($dsn, $username, $password);
} catch (PDOException $exception){
    $error_message = $exception -> getMessage();
    include('database_error.php');
    exit();
}

?>