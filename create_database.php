<?php
$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "site_db";

// Connect to server
$conn = mysqli_connect($hostname, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    // Check if error is because database already exists
    if (mysqli_errno($conn) == 1007) {
        // Do nothing if database already exists
    } else {
        // Display error message for other errors
        echo "Error creating database: " . mysqli_error($conn);
    }
}

// Select database
mysqli_select_db($conn, $dbname);
// Create user table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(11) NOT NULL AUTO_INCREMENT,
    is_admin TINYINT(1) NOT NULL DEFAULT 0,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) DEFAULT NULL,
    surname VARCHAR(255) DEFAULT NULL,
    PRIMARY KEY (id)
)";
if (mysqli_query($conn, $sql)) {
    echo "User table created successfully";
} else {
    echo "Error creating user table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS carts (
    id INT(11) NOT NULL AUTO_INCREMENT,
    user_id INT(11) NOT NULL,
    product_id INT(11) NOT NULL,
    quantity INT(11) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    total DECIMAL(10,2) NOT NULL,
    category VARCHAR(255) NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
if (mysqli_query($conn, $sql)) {
    echo "Carts table created successfully";
} else {
    echo "Error creating carts table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) NOT NULL,
    total_price FLOAT(10,2) NOT NULL,
    date DATETIME NOT NULL,
    status VARCHAR(255) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Orders table created successfully";
} else {
    echo "Error creating orders table: " . mysqli_error($conn);
}

$sql = "CREATE TABLE IF NOT EXISTS order_products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    order_id INT(6) NOT NULL,
    category VARCHAR(255) NOT NULL,
    product_id INT(6) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    quantity INT(11) NOT NULL
)";
if (mysqli_query($conn, $sql)) {
    echo "Order products table created successfully";
} else {
    echo "Error creating order_products table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
