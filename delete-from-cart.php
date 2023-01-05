<?php
    include("functions.php");
    include("connection.php");
    
    
        $id = $_POST['id'];
        $sql = "DELETE FROM carts WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: cart.php");
        } else {
            echo "Error deleting from the database";
        }
?>