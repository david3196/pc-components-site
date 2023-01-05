<?php
session_start();
    include("connection.php");
	include("functions.php");

	$user_data = check_login($conn);

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
            <li class="navbar-item-right" id="navbar-account"><button id="acc-btn"><img src="./navbar-images/account.png" alt="" id="account-img"></button></li>
            <?php
                if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1) {
                    // User is logged in as admin, display button
                    echo '<li class="navbar-item-right" id="navbar-admin"><a href="./adminPage.php"><img src="./navbar-images/admin.png" alt="" id="admin-img"></a></li>';
                }
            ?>
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
    <div id="connect-screen">
        <div class="account-box" id="logout">
            <div class="xbtn">&times;</div>
            <h4>DECONECTARE</h4>
            <p>Sunteti conectat ca <?php echo $user_data['name']; ?></p>
            <a href="logout.php">Deconectare</a>
        </div>  
    </div>
    <div id="menu">
        <h1>Meniu</h1>
        <div class="menu-options">
                <button class="menu-option" id="menu-btn1">Componente PC</button>
                <div class="submenu-options" id="sub-op1">
                    <button class="submenu-option" id="submenu1-btn1" onclick="location.href='display.php?category=cases'">Carcasa</button>
                    <button class="submenu-option" id="submenu1-btn2" onclick="location.href='display.php?category=memory'">Memorie</button>
                    <button class="submenu-option" id="submenu1-btn3" onclick="location.href='display.php?category=motherboards'">Placa de baza</button>
                    <button class="submenu-option" id="submenu1-btn4" onclick="location.href='display.php?category=power_supply_units'">Sursa</button>
                    <button class="submenu-option" id="submenu1-btn5" onclick="location.href='display.php?category=processors'">Procesor</button>
                    <button class="submenu-option" id="submenu1-btn6" onclick="location.href='display.php?category=video_cards'">Placa video</button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    <div class="connect-status" style="display:none">
        <p></p>
    </div>
    <script src="index.js"></script>
    <script type="module" src="connect.js"></script>
    <script type="module" src="menu.js"></script>
</body>
</html>