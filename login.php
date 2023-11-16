<html>
  <head>
    <title>Taskin Bakery & Cafe Since 1997</title>
    <link rel = "stylesheet" href = "style.css"> <!--Using external style sheet-->
  </head>
  <body>
  <div id="login-logout">
            <?php
            session_start();
            if (isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']) {
                $firstName = $_SESSION['firstName'];
                $lastName = $_SESSION['lastName'];
                $emailAddress = $_SESSION['emailAddress'];
                echo "Welcome, $firstName $lastName ($emailAddress)!  | <a href='logout.php'>Logout</a>";
            } else {
                echo "<a href='login.php'>Login</a>";
            }
            ?>
        </div>
  <?php include ('header.php'); ?> <!--Calling the Header section-->
  <nav>
        <!--Navigating from one page to the other-->
        <a href="./index.php">Home</a>
        <a href="./bread.php">Menu</a>
        <a href="./map.html">Map</a>
        <?php
            if (isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']) {
                echo '<a href="./shipping.php">Shipping Form</a>';
                echo ' ';
                echo '<a href="./create.php">Bread Manager</a>';
            }
            ?>
      </nav>
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
      <p style = "border:none"><?php echo isset($login_message) ? $login_message : ''; ?></p>
    </main>
    <?php include ('footer.php'); ?> <!--Calling the Footer section-->
  </body>
</html>




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