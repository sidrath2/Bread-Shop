<!--SIDRATH AHMED, 10/06/2023, IT-202-003, UNIT 3 Assignment, sa375@njit.edu-->


<?php
//Processing the input from the user from shpping.html
    $description = filter_input(INPUT_POST, 'description');
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_INT);
    $dimension = filter_input(INPUT_POST, 'dimension', FILTER_VALIDATE_INT);
    $handling = filter_input(INPUT_POST, 'handling');

    $max_weight = 150;
    $max_dimension = 36;

    
    $name2 = filter_input(INPUT_POST, 'name2');
    $street2 = filter_input(INPUT_POST, 'street2');
    $town2 = filter_input(INPUT_POST, 'town2');
    $state2 = filter_input(INPUT_POST, 'state2');
    $zipcode2 = filter_input (INPUT_POST, 'zipcode2', FILTER_VALIDATE_INT);
    

    $statesList = array(
        "Alabama", "Alaska", "Arizona", "Arkansas", "California", "Colorado", "Connecticut", "Delaware",
        "Florida", "Georgia", "Hawaii", "Idaho", "Illinois", "Indiana", "Iowa", "Kansas", "Kentucky",
        "Louisiana", "Maine", "Maryland", "Massachusetts", "Michigan", "Minnesota", "Mississippi",
        "Missouri", "Montana", "Nebraska", "Nevada", "New Hampshire", "New Jersey", "New Mexico", "New York",
        "North Carolina", "North Dakota", "Ohio", "Oklahoma", "Oregon", "Pennsylvania", "Rhode Island",
        "South Carolina", "South Dakota", "Tennessee", "Texas", "Utah", "Vermont", "Virginia", "Washington",
        "West Virginia", "Wisconsin", "Wyoming", "alabama", "alaska", "arizona", "arkansas", "california", "colorado", "connecticut", "delaware",
        "florida", "georgia", "hawaii", "idaho", "illinois", "indiana", "iowa", "kansas", "kentucky",
        "louisiana", "maine", "maryland", "massachusetts", "michigan", "minnesota", "mississippi",
        "missouri", "montana", "nebraska", "nevada", "new hampshire", "new jersey", "new mexico", "new york",
        "north carolina", "north dakota", "ohio", "oklahoma", "oregon", "pennsylvania", "rhode island",
        "south carolina", "south dakota", "tennessee", "texas", "utah", "vermont", "virginia", "washington",
        "west virginia", "wisconsin", "wyoming",
        "AL", "AK", "AZ", "AR", "CA", "CO", "CT", "DE", "FL", "GA", "HI", "ID", "IL", "IN", "IA", "KS", "KY", "LA", "ME", "MD", "MA", "MI", "MN",
        "MS", "MO", "MT", "NE", "NV", "NH", "NJ", "NM", "NY", "NC", "ND", "OH", "OK", "OR", "PA", "RI", "SC", 
        "SD", "TN", "TX", "UT", "VT", "VA", "WA", "WV", "WI", "WY", "al", "ak", "az", "ar", "ca", "co", "ct", "de", "fl", "ga", 
        "hi", "id", "il", "in", "ia", "ks", "ky", "la", "me", "md", "ma", "mi", "mn", "ms", "mo", "mt", "ne", "nv", "nh", "nj", "nm",
        "ny", "nc", "nd", "oh", "ok", "or", "pa", "ri", "sc", "sd", "tn", "tx", "ut", "vt", "va", "wa", "wv", "wi", "wy"
        );

//Checking for any errors
    $errors = [];
    
    if ($dimension > $max_dimension && $weight > $max_weight) {
        $errors[] = "<b>Item weight cannot exceed 150 lbs <br> Item dimensions cannot exceed 36 inches </b>";
    } else if ($weight > $max_weight) {
        $errors[] = "<b>Item weight cannot exceed 150 lbs</b>";
    } else if ($dimension > $max_dimension) {
        $errors[] = "<b>Item dimensions cannot exceed 36 inches</b>";
    } else if (empty($description)) {
        $errors[] = "<b>Please enter a valid food item to order</b>";
    } else if (empty($name2)) {
        $errors[] = "<b>Please enter a valid name</b>";
    } else if (empty($street2)) {
        $errors[] = "<b>Please enter a valid address</b>";
    } else if (empty($town2)) {
        $errors[] = "<b>Please enter a valid address</b>";
    } else if (empty($state2)) {
        $errors[] = "<b>Please enter a valid address</b>";
    }     

    if (!in_array($state2, $statesList)) {
        $errors[] = "<b>Please enter a valid state</b>";
    }

    if (!empty($errors)) {
        echo '<div style="color: red;">';
        foreach ($errors as $error) {
            echo $error . '<br>';
    }
        echo '</div>';
        include('shipping.html');
        exit();
    }
?>


<!--Sending the PHP back in HTML format-->
<html> 
    <head>
        <title>Shipping Label</title>
        <link rel = "stylesheet" href = "style.css">
        
    </head>
    <body>
    <?php include ('header.php'); ?>


    <h1>Shipping Label:</h1>

    <div style="border: 2px solid black; padding: 10px; padding-bottom: 80px; margin-left: auto; margin-right:600px;">
    <label>From: </label>
    <br>
    <span>Taskin Bakery and Cafe</span>
    <br>
    <span>103 Hazel Street, Paterson, NJ 07503</span>
    <br>

    <label>To: </label>
    <br>
    <span><?php echo htmlspecialchars($name2); ?></span>
    <br>
    <span><?php echo htmlspecialchars($street2); ?></span>,
    <span><?php echo htmlspecialchars($town2); ?></span>,
    <span><?php echo htmlspecialchars($state2); ?></span>
    <span><?php echo htmlspecialchars($zipcode2); ?></span>
    <br>

    <label>Item Description:</label>
    <br>
    <span><?php echo htmlspecialchars($description); ?></span>
    <br>
    <span><?php echo htmlspecialchars($handling); ?></span>
    <br>
    <span><?php echo htmlspecialchars($weight); ?>lbs</span>
    <br>
    <span><?php echo htmlspecialchars($dimension); ?>inches</span>
    <br>
    <span>Shipping Company: UPS</span>
    <br>
    <span>Shipping Class: Priority Mail</span>
    <br>
    <span>Order Number: 67542DEF</span>
    <br>
    <span>Ship Date: 10/06/2023</span>
    <br>
    <span>Tracking Number: 123456ABC</span>
    <br>
    <img src="CODE39_PC-removebg-preview.png" height="100" width="250" style="float:left;"/>
    <br>
</div>

    </body>
    <?php include ('footer.php'); ?>
</html>