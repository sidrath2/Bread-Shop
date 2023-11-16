<?php
require_once('authenticate.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = filter_input(INPUT_POST, 'password');

    if ($email && $password) {
        if (validate_login($email, $password)) {
            $login_result = validate_login($email, $password);
            session_start();
            $_SESSION['is_valid_admin'] = true;
            $_SESSION['firstName'] = $login_result['firstName'];
            $_SESSION['lastName'] = $login_result['lastName'];
            $_SESSION['emailAddress'] = $login_result['emailAddress'];
            header('Location: index.php');
            exit();
        } else {
            $login_message = "Invalid credentials.";
        }
    } else {
        $login_message = "Invalid input. Please enter a valid email and password.";
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Taskin Bakery & Cafe Since 1997</title>
  </head>
  <body>
    <h1>Bread Manager</h1>
    <main>
      <h1>Login</h1>
      <form action="login.php" method="post">
        <label>Email:</label>
        <input type="text" name="email" value="">
        <br>
        <label>Password:</label>
        <input type="password" name="password" value="">
        <br>
        <input type="submit" value="Login">
      </form>
      <p><?php echo isset($login_message) ? $login_message : ''; ?></p>
    </main>
  </body>
</html>
