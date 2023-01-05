<?php
session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "site_db";

// Connect to database
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get product id, quantity, and price from form submission
$product_id = $_POST['product_id'];
$quantity = $_POST['quantity'];
$user_id = $_POST['user_id'];
$price = $_POST['price'];
$category = $_POST['category'];
// Calculate total
$total = $quantity * $price;
$check_sql = "SELECT * FROM carts WHERE user_id='$user_id' AND product_id='$product_id'";
$check_result = mysqli_query($conn, $check_sql);
if(intval($quantity)>0){
if (mysqli_num_rows($check_result) == 0) {
    $sql = "INSERT INTO carts (user_id, product_id, quantity, price, total, category) VALUES ('$user_id','$product_id','$quantity','$price','$total','$category')";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "iiidds", $userId, $product_id, $quantity, $price, $total, $category);
    mysqli_stmt_execute($stmt);
}
else {
  $update_sql = "UPDATE carts SET quantity='$quantity' WHERE user_id='$user_id' AND product_id='$product_id'";
  mysqli_query($conn, $update_sql);
}}
// Redirect back to product page
header("Location: product.php?category=$category&id=$product_id");
exit;

mysqli_close($conn);
?>