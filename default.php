<?php
session_start();
    include("create_database.php");
    include("create_products_db.php");
	include("functions.php");
    session_destroy();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="connect.css">
    <link rel="stylesheet" href="menu.css">
    <title>doc</title>
</head>
<body>
    <div class="navbar">
        <ul class="navbar-menu">
            <li class="navbar-item-left" id="navbar-hamburger"><button id="hamburger-menu"></button></li>
            <li class="navbar-item-left" id="navbar-logo"><a href="./index.php"><img src="./navbar-images/logo.png" alt="" id="logo-img"></a></li>
            <li class="navbar-item-right" id="navbar-shopping-cart"><a href="./cart.php"><img src="./navbar-images/cart.png" alt="" id="shoppingcart-img"></a></li>
            <li class="navbar-item-right" id="navbar-account"><button id="acc-btn"><img src="./navbar-images/account.png" alt="" id="account-img"></button</li>
        </ul>
        </div>
    </div>
    <div class="promo">
        <div class="promo-imges">
            <img src="./promo-images/img-1.jpg" alt="" class="promo-img">
            <img src="./promo-images/img-2.jpg" alt="" class="promo-img">
            <img src="./promo-images/img-3.jpg" alt="" class="promo-img">
        </div>
        
    </div>
    <div id="connect-screen"></div>
    <div id="menu">
        <h1>Meniu</h1>
        <div class="menu-options">
                <button class="menu-option" id="menu-btn1">Componente PC</button>
                <div class="submenu-options" id="sub-op1">
                    <button class="submenu-option" id="submenu1-btn1"><a href="./pagini-produse/placi-video/pv.html">Carcasa</a></button>
                    <button class="submenu-option" id="submenu1-btn2"><a href="./pagini-produse/placi-de-baza/pdb.html">Memorie</a></button>
                    <button class="submenu-option" id="submenu1-btn3"><a href="./pagini-produse/procesoare/procesoare.html">Placa de baza</a></button>
                    <button class="submenu-option" id="submenu1-btn4"><a href="./pagini-produse/procesoare/procesoare.html">Sursa</a></button>
                    <button class="submenu-option" id="submenu1-btn5"><a href="./pagini-produse/procesoare/procesoare.html">Procesor</a></button>
                    <button class="submenu-option" id="submenu1-btn6"><a href="./pagini-produse/procesoare/procesoare.html">Placa video</a></button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    <script src="index.js"></script>
    <script type="module" src="connect.js"></script>
    <script type="module" src="menu.js"></script>
    <script>
    console.log(<?php echo json_encode($_SESSION); ?>);
</script>
</body>
</html>