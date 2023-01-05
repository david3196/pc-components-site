<?php
    session_start();
    include("connection.php");
	include("functions.php");
	$user_data = check_login($con);
    if(isset($_POST['scope'])){
        $scope = $_POST['scope'];
        switch($scope){
            case "add":
                $prod_name = $_POST['prod_name'];
                $prod_qt = $_POST['prod_qt'];
                $prod_price = $_POST['prod_price'];

                $myObj = new stdClass();
                $myObj->prod_name = $prod_name;
                $myObj->prod_qt = $prod_qt;
                $myObj->prod_price = $prod_price;
                $id = $user_data['id'];
                echo "$id";
                $myJSON = json_encode($myObj);
                $sqlk = "UPDATE users SET cart='$myJSON' WHERE id='$id'";
                
                if (mysqli_query($con, $sqlk)) {
                echo "Record updated successfully";
                } else {
                echo "Error updating record: " . mysqli_error($con);
                }
                break;
            default:
                echo 500;
        }
    }
    else echo "noc";
    
    


?>
