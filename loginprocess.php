<?php
    require "databaseconnection.php";
    $query = "SELECT Username, Password, Role FROM users WHERE username = '$_POST[Username]' AND Password = '$_POST[Password]'";
    $rows = mysqli_query($connection, $query);
    if(mysqli_num_rows($rows) > 1){
        $error_message = "There is more than one user with this username.!";
        $_SESSION['error'] = $error_message;
        unset($_SESSION['authorization']);
        header('Location: ./login.php');
    } else if (mysqli_num_rows($rows) > 0){
        session_start();
        $row = $rows -> fetch_assoc();
        $_SESSION['authorization'] = "$row[Role]";
        $_SESSION['Username'] = "$_POST[Username]";
        unset($_SESSION['error']);
        if($row['Role'] == 1){
            header('Location: ./adminpanel.php');
        }
    } else{
        session_start();
        $error_message = "An authenticatino error occurred!";
        $_SESSION['error'] = $error_message;
        unset($_SESSION['authorization']);
        header('Location: ./login.php');
    }
?>