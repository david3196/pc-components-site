<?php
session_start();
    include("functions.php");
    include("connection.php");

	$user_data = check_login($conn);

    $dbhost2 = "localhost";
    $dbuser2 = "root";
    $dbpass2 = "";
    $dbname2 = "components";

    if(!$conn2 = mysqli_connect($dbhost2,$dbuser2,$dbpass2,$dbname2)){
        die("Connection failed: " . mysqli_connect_error());}
    $user_id = $user_data['id'];
    
    // Select all rows from the carts table where user_id is equal to $user_id
    $sql = "SELECT * FROM carts WHERE user_id = $user_id";
    $result = mysqli_query($conn, $sql);
    $result2 = mysqli_query($conn, $sql);
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
    <link rel="stylesheet" href="menu.css">
    <link rel="stylesheet" href="cart.css">
    <title>doc</title>
</head>
<body>
    <div class="navbar">
        <ul class="navbar-menu">
            <li class="navbar-item-left" id="navbar-hamburger"><button id="hamburger-menu"></button></li>
            <li class="navbar-item-left" id="navbar-logo"><a href="./index.php"><img src="./navbar-images/logo.png" alt="" id="logo-img"></a></li>
            <li class="navbar-item-right" id="navbar-shopping-cart"><a href="./cart.html"><img src="./navbar-images/cart.png" alt="" id="shoppingcart-img"></a></li>
        </ul>
        </div>
    </div>
    <div class="container">
        <?php 
        if (mysqli_num_rows($result) > 0) {
            // Start the table
            echo '<table>';
            echo '<tr><th>Product name</th><th>Quantity</th><th>Price</th><th>Total</th><th>Check compatibility</th><th>Delete</th></tr>';
            $overall_total = 0;
            // For each row in the table
            while ($row = mysqli_fetch_assoc($result)) {
                // Extract the product_id and quantity
                $product_id = $row['product_id'];
                $quantity = $row['quantity'];
                $price = $row['price'];
                $total = $row['total'];
                $category = $row['category'];
                $id = $row['id'];
                // Select the name of the product from the components table using the product_id
                $sql2 = "SELECT name FROM $category WHERE id = $product_id";
                $product_result = mysqli_query($conn2, $sql2);
                $product_row = mysqli_fetch_assoc($product_result);
                $product_name = $product_row['name'];
        
                // Output the row in the table
                echo '<tr>';
                echo "<td>$product_name</td>";
                echo "<td>$quantity</td>";
                echo "<td>" . intval($price) . "</td>";
                echo "<td>" . intval($total) . "</td>";
                echo "<td><input type='checkbox' name='checkbox[]' value='$category'></td>";
                echo "<td><form action='delete-from-cart.php' method='post'>
                <input type='hidden' name='id' value='$id'>
                <button id='del-btn' type='submit'>X</button>
                </form></td>";
                echo '</tr>';
        
                // Add the total of this row to the overall total
                $overall_total += $total;
            }
        
            // Close the table
            echo '</table>';
        
            // Output the overall total
            echo "</div><div id='total-price'>Overall total: $overall_total (LEI)</div>";
            echo '<div id="place-order"><form action="place-order.php" method="post">';
            while ($row = mysqli_fetch_assoc($result2)){
                $product_id = $row['product_id'];
                $quantity = $row['quantity'];
                $price = $row['price'];
                $category = $row['category'];
                $sql2 = "SELECT name FROM $category WHERE id = $product_id";
                $product_result = mysqli_query($conn2, $sql2);
                $product_row = mysqli_fetch_assoc($product_result);
                $product_name = $product_row['name'];
                echo '<input type="hidden" name="product_id[]" value="'. $product_id . '">';
                echo '<input type="hidden" name="category[]" value="' . $category . '">';
                echo '<input type="hidden" name="product_name[]" value="' . $product_name . '">';
                echo '<input type="hidden" name="price[]" value="' . $price . '">';
                echo '<input type="hidden" name="quantity[]" value="' . $quantity . '">';
            }
            echo '<input type="hidden" name="user_id" value="' . $user_id . '">';
            echo '<input type="hidden" name="total_price" value="' . $overall_total . '">';
            echo '<button id="place-btn" type="submit">Place Order</button>';
            echo '</form></div>';
        } else {
            echo 'No items in the cart</div>';
        }
        ?>
    
    <div id="menu">
        <h1>Meniu</h1>
        <div class="menu-options">
                <button class="menu-option" id="menu-btn1">Componente PC</button>
                <div class="submenu-options" id="sub-op1">
                    <button class="submenu-option" id="submenu1-btn1"><a href="./pagini-produse/placi-video/pv.html">Placi video</a></button>
                    <button class="submenu-option" id="submenu1-btn2"><a href="./pagini-produse/placi-de-baza/pdb.html">Placi de baza</a></button>
                    <button class="submenu-option" id="submenu1-btn3"><a href="./pagini-produse/procesoare/procesoare.html">Procesoare</a></button>
                </div>
                <button class="menu-option" id="menu-btn2">Despre noi</button>
                <button class="menu-option" id="menu-btn3">Contact</button>

        </div>
    </div>
    
    <script type="module" src="menu.js"></script>
    <script type="module" src="cart.js"></script>
</body>
</html>