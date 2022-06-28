<?php
    require 'checkauthorization.php';
    require 'databaseconnection.php';
    $user_id = $_SESSION['ID'];
    $query = "SELECT ID, Date_Time FROM orders where UserID = '$user_id' && Date_Time is Null";
    $rows = mysqli_query($connection, $query);
    if(mysqli_num_rows($rows) == 0){
        $query = "INSERT INTO orders(UserID) values('$user_id')";
        echo $query;
        $rows = mysqli_query($connection, $query);
        $query = "SELECT ID, Date_Time FROM orders where UserID = '$user_id' && Date_Time is Null";
        $rows = mysqli_query($connection, $query);
    }
    $row = $rows->fetch_assoc();
    $order_id = $row['ID'];
    $food_id = $_POST['food_ID'];
    $number = $_POST['number'];
    $query = "SELECT OrderID, FoodID FROM order_food WHERE OrderID = '$order_id' && FoodID = '$food_id'";
    $rows = mysqli_query($connection, $query);
    if(mysqli_num_rows($rows) == 0){
        $query = "INSERT INTO order_food(OrderID, FoodID, Number) values('$order_id', '$food_id', '$number')";
        mysqli_query($connection, $query);
        $message = "Item added to cart successfully";
    } else{
        $query = "UPDATE order_food SET Number = '$number' WHERE OrderID = '$order_id' && FoodID = '$food_id'";
        mysqli_query($connection, $query);
        $message = "Item updated in cart successfully";
    }
    header("Location: ./userpanel.php");
    
?>