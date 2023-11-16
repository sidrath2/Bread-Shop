<?php 
session_start();

$_SESSION = [];
session_destroy();
header('Location: index.php');
            exit();
$login_message = 'You have been logged out.';
include ('login.php');


?>