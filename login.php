<?php
session_start();

    include("connection.php");
    include("functions.php");
   
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        $email = $_POST['email'];
        $password = $_POST['pass'];

        
            $query = "select * from users where email = '$email' limit 1";

            $result = mysqli_query($conn, $query);
            if($result){
                if($result && mysqli_num_rows($result) > 0){
                    
                    $user_data = mysqli_fetch_assoc($result);

                    if($user_data['password'] === $password){
                        $_SESSION['user_id'] = $user_data['id'];
                        $_SESSION['is_admin'] = $user_data['is_admin'];
                        header("Location: index.php");
                    } else{
                        echo '<script language="javascript">';
                        echo "alert('Eroare la Conectare : Parola incorecta.');";
                        echo "window.location.href='index.php';";
                        echo '</script>';
                    }
                }
                else if(empty($user_data['password']) || empty($user_data['email'])){
                    echo '<script language="javascript">';
                    echo "alert('Eroare la Conectare : Introduceti emailul si parola!');";
                    echo "window.location.href='index.php';";
                    echo '</script>';
                }
                else{
                    echo '<script language="javascript">';
                    echo "alert('Eroare la Conectare : Date de conectare incorecte.');";
                    echo "window.location.href='index.php';";
                    echo '</script>';
                }
            }
            
        
    }
    mysqli_close($conn);
?>
