<!--SIDRATH AHMED, 10/06/2023, IT-202-003, UNIT 3 Assignment, sa375@njit.edu-->


<!--The following is the code for the Home page-->
<html>
    <head>
        <title>Taskin Bakery & Cafe Since 1997</title>
        <link rel = "stylesheet" href = "style.css"> <!--Using external style sheet-->
</head>
<body>
    <?php include ('header.php'); ?> <!--Calling the Header section-->
    <nav>
        <!--Navigating from one page to the other-->
        <a href="./index.php">Home</a>
        <a href="./shipping.html">Shipping Form</a>
        <a href="./bread.php">Menu</a>
        <a href="./map.html">Map</a>

      </nav>
    <main>
        <h3>About us</h3>
            <p>Taskin Bakery, founded in 1997 in Paterson, NJ, specializes in traditional Turkish bread, pastries, and desserts. We prioritize quality, using the finest ingredients and maintaining Kosher certification. As a family-owned business, we serve customers globally, delivering our products to various establishments and offering direct delivery through US carriers. We're proud to be the first Turkish bakery in the US to elevate "Turkish Pide" to its own brand. Our commitment is to excellence and convenience. </p>
        
        <h3>Our Food</h3>
        <ul>
            <li>Pide: a boat-shaped, thin crust Turkish pizza typically topped with ingredients like ground meat, vegetables, and herbs.</li>

            <li>Simit: a circular bread encrusted with sesame seeds, giving it a delightful crunch.</li>

            <li>Baklava: a rich and sweet pastry made from layers of thin filo dough, filled with chopped nuts and sweetened with honey or syrup. </li>

            <li>Lahmacun: a thin, round flatbread topped with a mixture of minced meat, vegetables, and spices. </li>

            <li>Sesame Rings (Kandil Simiti): small, sesame-covered bread rings. </li>

            <li>Çörek: a type of sweet or savory pastry, similar to a bun or roll. </li>

            <li>Poğaça: small, soft, and savory pastries usually filled with ingredients like cheese, olives, or potatoes. </li>

            <li>Gözleme: a savory Turkish flatbread filled with various fillings, such as spinach, cheese, or minced meat. </li>

            <li>Revani: a traditional Turkish semolina cake soaked in a sweet syrup, often flavored with lemon or orange. </li>

            <li>Kumpir: a baked potato dish popular in Turkey. </li>
</ul>

<img src = "kumpir.jpg"
    height = "150"
    width = "170"/>
<img src = "lamacun.jpg" 
    height = "150" 
    width = "163"/>
<img src = "Pide.png" 
    height = "150"
    width = "200" />
<img src = "Simit.jpg" 
    height = "150" 
    width = "200"/>
<img src = "gozleme-24.jpg" 
    height = "150" 
    width = "180"/>

</main>
<?php include ('footer.php'); ?> <!--Calling the Footer section-->


</body>
</html>