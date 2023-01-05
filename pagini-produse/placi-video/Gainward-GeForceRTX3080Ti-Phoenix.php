<?php
session_start();
    include("../.././connection.php");
	include("../.././functions.php");

    $user_data = check_login($con);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Gainward GeForce RTX 3080 Ti Phoenix</title>
    <link rel="stylesheet" href="../.././style.css">
    <link rel="stylesheet" href="../../navbar.css">
    <link rel="stylesheet" href="../../connect.css">
    <link rel="stylesheet" href="../../menu.css">
    <link rel="stylesheet" href="../../product.css">
    
</head>
<body>
    <div class="navbar">
        <ul class="navbar-menu"><a href="../.././navbar-images/logo.png"></a>
            <li class="navbar-item-left" id="navbar-hamburger"><button id="hamburger-menu"></button></li>
            <li class="navbar-item-left" id="navbar-logo"><a href="../../index.php"><img src="../../navbar-images/logo.png" alt="" id="logo-img"></a></li>
            <li class="navbar-item-right" id="navbar-shopping-cart"><a href="../../cart.php"><img src="../../navbar-images/cart.png" alt="" id="shoppingcart-img"></a></li>
        </ul>
        </div>
    </div>

    <div id="menu">
        <h1>Meniu</h1>
        <div class="menu-options">
                <button class="menu-option" id="menu-btn1">Componente PC</button>
                <div class="submenu-options" id="sub-op1">
                    <button class="submenu-option" id="submenu1-btn1">Placi video</button>
                    <button class="submenu-option" id="submenu1-btn2"><a href="./../placi-de-baza/pdb.html">Placi de baza</a></button>
                    <button class="submenu-option" id="submenu1-btn3"><a href="./../procesoare/procesoare.html">Procesoare</a></button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    <div class="container">
        <div class="img-display">
            <div class="images">
                <img src="./img/Gainward-GeForceRTX3080Ti-Phoenix/im1.jpg" alt="" class="img">
                <img src="./img/Gainward-GeForceRTX3080Ti-Phoenix/im2.jpg" alt="" class="img">
                <img src="./img/Gainward-GeForceRTX3080Ti-Phoenix/im3.jpg" alt="" class="img">
            </div>
            <h2>Pret: 8000 RON</h2>
            <div class="add-to-cart">
                <div class="add-to-cart-container">
                    <div class="set-quantity">
                        <button class="minus">-</button>
                        <input type="text" disabled value="1" class="quantity" id="qnty2">
                        <button class="plus">+</button>
                    </div>
                    <button class="add-btn">Adauga in cos</button>
                </div>
            </div>
            <table>
                <tr>
                    <td>Denumire:</td>
                    <td>Placa video Gainward GeForce RTX 3080 Ti Phoenix LHR 12GB GDDR6X 384-bit</td>
                </tr>
                <tr>
                    <td>Garantie:</td>
                    <td>24 luni</td>
                </tr>
                <tr>
                    <td>Interfata:</td>
                    <td>PCI Express x16 4.0</td>
                </tr>
                <tr>
                    <td>Rezolutie maxima:</td>
                    <td>7680x4320 pixeli</td>
                </tr>
                <tr>
                    <td>Producator chipset:</td>
                    <td>NVIDIA</td>
                </tr>
                <tr>
                    <td>Tehnologie de fabricatie:</td>
                    <td>8 nm</td>
                </tr>
                <tr>
                    <td>Procesor grafic:</td>
                    <td>Ampere GA102</td>
                </tr>
                <tr>
                    <td>GPU Boost clock:</td>
                    <td>1665 MHz</td>
                </tr>
                <tr>
                    <td>Texture Units:</td>
                    <td>320</td>
                </tr>
                <tr>
                    <td>Raster Operators:</td>
                    <td>112</td>
                </tr>
                <tr>
                    <td>Numar de tranzistoare:</td>
                    <td>28000 milioane</td>
                </tr>
            </table>
        </div>
    </div>
    <script type="module" src="../.././menu.js"></script>
    <script type="module" src="../.././product.js"></script>
    <script type="module" src="./scripts/pv2.js"></script>
</body>
</html>