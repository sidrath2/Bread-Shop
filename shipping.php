<!--SIDRATH AHMED, 10/06/2023, IT-202-003, UNIT 3 Assignment, sa375@njit.edu-->

<html>
    <head>
        <title>Shipping Form</title>
        <link rel="stylesheet" href="style.css"> <!--Using external style sheets-->
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
        <?php include ('header.php'); ?>
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

        <!--Users will input their information in the following-->
        <h1>Shipping Form</h1>

        <form action="ShippingConfirm.php" method="post">
            <h2>Item Information</h2>
            <label>Food Item:</label>
            <input type="text" name="description"/>
            <br>
            <label>Weight (in lbs):</label>
            <input type="text" name="weight"/>
            <br>
            <label>Package Dimensions (in inch):</label>
            <input type="text" name="dimension"/>
            <br>
            <label>Special Handling Instructions:</label>
            <input type="text" name="handling"/>
            <br>

            <h2>Recipient Information</h2>
            <label>First and Last Name:</label>
            <input type="text" name="name2"/>
            <br>
            <label>Street Address:</label>
            <input type="text" name="street2"/>
            <br>
            <label>City:</label>
            <input type="text" name="town2"/>
            <br>
            <label>State:</label>
            <input type="text" name="state2"/>
            <br>
            <label>Zip Code:</label>
            <input type="text" name="zipcode2"/>
            <br>
            <input type="submit" value="Submit"/>
        </form>
        <?php include ('footer.php'); ?> 
    </body>
</html>
