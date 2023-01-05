<?php
session_start();

// Connect to the database
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "site_db";
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the order data from the form submission
$user_id = $_POST['user_id'];
$total_price = $_POST['total_price'];
$date = date('Y-m-d H:i:s');
$status = "pending";
echo "$user_id $total_price $date $status";
// Insert a new row into the orders table
$sql = "INSERT INTO orders (user_id, total_price, date, status) VALUES ('$user_id', '$total_price', '$date', '$status')";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "idss", $user_id, $total_price, $date, $status);
mysqli_stmt_execute($stmt);

// Get the ID of the newly-created order
$order_id = mysqli_insert_id($conn);

// Loop through the list of products in the order
for ($i = 0; $i < count($_POST['product_id']); $i++) {
    // Get the data for the current product
    $category = $_POST['category'][$i];
    $product_id = $_POST['product_id'][$i];
    $product_name = $_POST['product_name'][$i];
    $price = $_POST['price'][$i];
    $quantity = $_POST['quantity'][$i];

    // Insert a new row into the order_products table
    $sql = "INSERT INTO order_products (order_id, category, product_id, product_name, price, quantity) VALUES ('$order_id', '$category', '$product_id', '$product_name', '$price', '$quantity')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "isisdi", $order_id, $category, $product_id, $product_name, $price, $quantity);
    mysqli_stmt_execute($stmt);
}
$sql = "DELETE FROM carts WHERE user_id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
header("Location: cart.php");
exit;

mysqli_close($conn);
?>