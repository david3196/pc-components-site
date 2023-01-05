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
    <title>ASUS TUF GAMING X570-PLUS</title>
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
                    <button class="submenu-option" id="submenu1-btn1"><a href="./../placi-video/pv.html">Placi video</a></button>
                    <button class="submenu-option" id="submenu1-btn2">Placi de baza</button>
                    <button class="submenu-option" id="submenu1-btn3"><a href="./../procesoare/procesoare.html">Procesoare</a></button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    <div class="container">
        <div class="img-display">
            <div class="images">
                <img src="./img/ASUS-TUF-GAMING-X570-PLUS/im1.jpg" alt="" class="img">
                <img src="./img/ASUS-TUF-GAMING-X570-PLUS/im2.jpg" alt="" class="img">
                <img src="./img/ASUS-TUF-GAMING-X570-PLUS/im3.jpg" alt="" class="img">
            </div>
            <h2>Pret: 1100 RON</h2>
            <div class="add-to-cart">
                <div class="add-to-cart-container">
                    <div class="set-quantity">
                        <button class="minus">-</button>
                        <input type="text" disabled value="1" class="quantity" id="qnt2">
                        <button class="plus">+</button>
                    </div>
                    <button class="add-btn">Adauga in cos</button>
                </div>
            </div>
            <table>
                <tr>
                    <td>Denumire:</td>
                    <td>Placa de baza ASUS TUF GAMING X570-PLUS</td>
                </tr>
                <tr>
                    <td>Garantie:</td>
                    <td>24 luni</td>
                </tr>
                <tr>
                    <td>Format:</td>
                    <td>ATX</td>
                </tr>
                <tr>
                    <td>Soclu procesor:</td>
                    <td>AM4</td>
                </tr>
                <tr>
                    <td>Producator chipset:</td>
                    <td>AMD</td>
                </tr>
                <tr>
                    <td>Model chipset:</td>
                    <td>X570</td>
                </tr>
                <tr>
                    <td>Procesoare suportate:</td>
                    <td>AMD AM4 Socket Ryzen 2000/3000/5000 Series</td>
                </tr>
                <tr>
                    <td>Interfata grafica:</td>
                    <td>PCI Express x16 4.0</td>
                </tr>
                <tr>
                    <td>Placa video integrata:</td>
                    <td>Necesita procesor cu tehnologia AMD Radeon Vega Graphics</td>
                </tr>
                <tr>
                    <td>Placa audio integrata:</td>
                    <td>7.1 Audio with Realtek S1200A</td>
                </tr>
                <tr>
                    <td>Chipset audio:</td>
                    <td>Realtek S1200A</td>
                </tr>
            </table>
        </div>
    </div>
    <script type="module" src="../.././menu.js"></script>
    <script type="module" src="../.././product.js"></script>
    <script type="module" src="./scripts/pdb2.js"></script>
</body>
</html>