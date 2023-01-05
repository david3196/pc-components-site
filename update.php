<?php/*
// Initialize variables
$hostname = "localhost";
$username = "username";
$password = "password";
$dbname = "database_name";

// Check if user is logged in as admin
if (!isAdmin()) {
    // Redirect to login page if not logged in as admin
    header("Location: login.php");
    exit;
}

// Check if form was submitted
if (isset($_POST['submit'])) {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $image = mysqli_real_escape_string($conn, $_POST['image']);

    // Insert product into database
    $sql = "INSERT INTO products (name, description, price, image) VALUES ('$name', '$description', '$price', '$image')";
    if (mysqli_query($conn, $sql)) {
        // Redirect to product list page on success
        header("Location: products.php");
        exit;
    } else {
        // Display error message on failure
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Connect to database
$conn = mysqli_connect($hostname, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form action="add_product.php" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br>
        <label for="price">Price:</label><br>
        <input type="text" id="price" name="price"><br>
        <label for="image">Image:</label><br>
        <input type="text" id="image" name="image"><br><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>