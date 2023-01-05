<?php
    session_start();
    include("functions.php");
    include("connection.php");

	$user_data = check_login($conn);
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "components";

    if(!$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname)){
    die("failed to connect");}

    $category = $_GET['category'];
    $id = $_GET['id'];

    $sql = "SELECT * FROM " . $category . " WHERE id='" . $id . "'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        // Output data of the row
        $row = mysqli_fetch_assoc($result);
    } else $row="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title></title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./navbar.css">
    <link rel="stylesheet" href="./connect.css">
    <link rel="stylesheet" href="./menu.css">
    <link rel="stylesheet" href="./product.css">
    
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
                <?php echo '<img src="' . $row['imglink'] . '" alt="" class="img">'; ?>
                
            </div>
            <?php echo '<h2>Price: ' . intval($row['price']) . ' RON</h2>' ?>
            <?php echo '<input type="hidden" id="stock" value="' . intval($row['stock']) . '. ">'; ?>
            <form action="add-to-cart.php" method="post">
                <div class="add-to-cart">
                <div class="add-to-cart-container">
                    <div class="set-quantity">
                        <button class="modif-qnt" id="minus" type="button">-</button>
                        <input type="text" readonly value="0" class="quantity" id="qnt2" name="quantity">
                        <button class="modif-qnt" id="plus" type="button">+</button>
                    </div>
                    <?php echo '<input type="hidden" name="product_id" value="' . $row['id'] . '">'; ?>
                    <?php echo '<input type="hidden" name="user_id" value="' . $user_data['id'] . '">'; ?>
                    <?php echo '<input type="hidden" name="price" value="' . $row['price'] . '">'; ?>
                    <?php echo '<input type="hidden" name="category" value="' . $category . '">'; ?>
                    <button type="submit" class="add-btn">Add to cart</button>
                </div>
                </div>
            </form>
            <table>
                <tr>
                    <td>Name:</td>
                    <td><?php echo $row['name']; ?></td>
                </tr>
                <tr>
                    <td>Warranty:</td>
                    <td>24 months</td>
                </tr>
                <?php
                $desc = $row['descr'];
                $lines = explode("\n", $desc);

                foreach ($lines as $line) {
                    // Split the row into an array of columns
                    $columns = explode(":", $line);

                    // Output the row as a table row with two cells
                    echo '<tr>';
                    echo '<td>' . $columns[0] . '</td>';
                    echo '<td>' . $columns[1] . '</td>';
                    echo '</tr>';
                }

                ?>
            </table>
        </div>
    </div>
    <script type="module" src="../.././menu.js"></script>
    <script type="module" src="./product.js"></script>
    <script type="module" src="./scripts/pdb2.js"></script>
</body>
</html>