<?php
    require 'databaseconnection.php';
    require 'checkauthorization.php';
    $id = $_POST['orderID'];
    $query="UPDATE orders SET Date_Time=now() WHERE ID=$id";
    mysqli_query($connection, $query);
    header('Location: ./cart.php');
?>