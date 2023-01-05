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
    <title>Ryzen 9 3900XT</title>
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
                    <button class="submenu-option" id="submenu1-btn2"><a href="./../placi-de-baza/pdb.html">Placi de baza</a></button>
                    <button class="submenu-option" id="submenu1-btn3">Procesoare</button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    <div class="container">
        <div class="img-display">
            <div class="images">
                <img src="./img/Ryzen9-3900XT/im1.jpg" alt="" class="img">
                <img src="./img/Ryzen9-3900XT/im2.jpg" alt="" class="img">
                <img src="./img/Ryzen9-3900XT/im3.jpg" alt="" class="img">
            </div>
            <h2>Pret: 3000 RON</h2>
            <div class="add-to-cart">
                <div class="add-to-cart-container">
                    <div class="set-quantity">
                        <button class="minus">-</button>
                        <input type="text" disabled value="1" class="quantity" id="qt3">
                        <button class="plus">+</button>
                    </div>
                    <button class="add-btn">Adauga in cos</button>
                </div>
            </div>
            <table>
                <tr>
                    <td>Denumire:</td>
                    <td>Procesor AMD Ryzen 9 3900XT 3.8GHz</td>
                </tr>
                <tr>
                    <td>Garantie:</td>
                    <td>24 luni</td>
                </tr>
                <tr>
                    <td>Socket:</td>
                    <td>AM4</td>
                </tr>
                <tr>
                    <td>Nucleu:</td>
                    <td>Matisse</td>
                </tr>
                <tr>
                    <td>Numar nuclee:</td>
                    <td>12</td>
                </tr>
                <tr>
                    <td>Numar thread-uri:</td>
                    <td>24</td>
                </tr>
                <tr>
                    <td>Frecventa:</td>
                    <td>3,8 GHz</td>
                </tr>
                <tr>
                    <td>Tehnologie de fabricatie:</td>
                    <td>7 nm</td>
                </tr>
                <tr>
                    <td>Suport Memorie Tip:</td>
                    <td>DDR4</td>
                </tr>
                <tr>
                    <td>Memorie maxima:</td>
                    <td>128 GB</td>
                </tr>
                <tr>
                    <td>Frecventa memorie:</td>
                    <td>3200 MHz</td>
                </tr>
            </table>
        </div>
    </div>
    <script type="module" src="../.././menu.js"></script>
    <script type="module" src="../.././product.js"></script>
    <script type="module" src="./scripts/procesor3.js"></script>
</body>
</html>