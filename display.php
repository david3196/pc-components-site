<?php
    session_start();
    include("functions.php");
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "components";

    if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect");}
    $category = $_GET['category'];

    // Select all rows from the specified table
    $sql = "SELECT * FROM $category";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Procesoare</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./connect.css">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="./products-page.css">
</head>
<body>
    <div class="navbar">
        <ul class="navbar-menu"><a href="./navbar-images/logo.png"></a>
            <li class="navbar-item-left" id="navbar-hamburger"><button id="hamburger-menu"></button></li>
            <li class="navbar-item-left" id="navbar-logo"><a href="./index.php"><img src="./navbar-images/logo.png" alt="" id="logo-img"></a></li>
            <li class="navbar-item-right" id="navbar-shopping-cart"><a href="./cart.php"><img src="./navbar-images/cart.png" alt="" id="shoppingcart-img"></a></li>
        </ul>
        </div>
    </div>

    <div id="connect-screen"></div>
    <div id="menu">
        <h1>Meniu</h1>
        <div class="menu-options">
                <button class="menu-option" id="menu-btn1">Componente PC</button>
                <div class="submenu-options" id="sub-op1">
                    <button class="submenu-option" id="submenu1-btn1"><a href="./../placi-video/pv.html">Placi video</a></button>
                    <button class="submenu-option" id="submenu1-btn2"><a href="./../placi-de-baza/pdb.html">Placi de baza</a></button>
                    <button class="submenu-option" id="submenu1-btn3"><a href="./procesoare.html">Procesoare</a></button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    <div class="products-container">
        <?php 
            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row['id'];
                    echo '<div class="product">';
                    echo '<a href="product.php?category=' . $category . '&id=' .  $id . ' ">';
                    echo '<div class="center-img"><img class="product-img" src="' . $row['imglink'] . '" alt=""></div> ';
                    echo '<h4 class="product-name">' . $row['name'] . '</h4>';
                    echo '<ul>';
                    echo '<li>Pret: ' . intval($row['price']) . ' RON</li>';
                    echo '<li>In stoc: ' . $row['stock'] . '</li>';
                    echo '</ul></a></div>';
                }}
                else {echo " ";}
            mysqli_close($conn);
        ?>
         
    </div>
    <script type="module" src="../.././menu.js"></script>
    <script type="module" src="../.././products-page.js"></script>
</body>
</html>