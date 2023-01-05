<?php
session_start();

    include("connection.php");
    include("functions.php");
   
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['pass1'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $pass_confirm = $_POST['pass2'];
        if(empty($email)){
            echo '<script language="javascript">';
            echo "alert('Eroare la Inregistrare : Trebuie sa introduceti o adresa de email!');";
            echo "window.location.href='index.php';";
            echo '</script>';
        }
        else if (!filter_var($email, FILTER_VALIDATE_EMAIL))  {
            echo '<script language="javascript">';
            echo "alert('Eroare la Inregistrare : Adresa de email invalida.');";
            echo "window.location.href='index.php';";
            echo '</script>';
        }
        else if(empty($name)){
            echo '<script language="javascript">';
            echo "alert('Eroare la Inregistrare : Trebuie sa introduceti un prenume!');";
            echo "window.location.href='index.php';";
            echo '</script>';
        }
        else if(!preg_match("/^[a-zA-Z-' ]*$/",$name)){
            echo '<script language="javascript">';
            echo "alert('Eroare la Inregistrare : Prenume invalid.');";
            echo "window.location.href='index.php';";
            echo '</script>';
        }
        else if(!preg_match("/^[a-zA-Z-' ]*$/",$surname)){
            echo '<script language="javascript">';
            echo "alert('Eroare la Inregistrare : Nume invalid.');";
            echo "window.location.href='index.php';";
            echo '</script>';
        }
        else if(empty($password)){
            echo '<script language="javascript">';
            echo "alert('Eroare la Inregistrare : Trebuie sa introduceti o parola!');";
            echo "window.location.href='index.php';";
            echo '</script>';
        }
        else if($password != $pass_confirm){
            echo '<script language="javascript">';
            echo "alert('Eroare la Inregistrare : Cofirmare a parolei nereusita.');";
            echo "window.location.href='index.php';";
            echo '</script>';
        }
        else{
            $sql = "SELECT COUNT(*) FROM users";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            if ($row['COUNT(*)'] == 0) {
                // Insert user with is_admin = 1
                $sql = "INSERT INTO users (is_admin, email, password, name, surname) VALUES (1, '$email', '$password', '$name', '$surname')";
            } else {
                // Insert user with is_admin = 0
                $sql = "INSERT INTO users (is_admin, email, password, name, surname) VALUES (0, '$email', '$password', '$name', '$surname')";
            }
            if (mysqli_query($conn, $sql)) {
                echo "User inserted successfully";
            } else {
                echo "Error inserting user: " . mysqli_error($conn);
            }
            mysqli_close($conn);
            header("Location: index.php");
            
            }
    }
?>