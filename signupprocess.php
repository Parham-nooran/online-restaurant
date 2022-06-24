<?php
    require "databaseconnection.php";
    if(!(empty($_POST['Password']) || empty($_POST['Email']) || $_POST['Password'] == "" || $_POST['Email'] == "")){
        if($_POST['Password'] === $_POST['Repeat-Password']){
            if(filter_var($_POST['Email'], FILTER_VALIDATE_EMAIL)){
                session_start();
                unset($_SESSION['error']);
                header('Location: ./signup.php');
                $email = $_POST['Email'];
                $password = $_POST['Password'];
                $query = "INSERT INTO users(Username, Password, Role) values ('$email', '$password', 0)";
                echo $query;
                mysqli_query($connection, $query);
            } else{
                 session_start();
                 $error_message = "Email is not valid!";
                 $_SESSION['error'] = $error_message;
                 unset($_SESSION['authorization']);
                 header('Location: ./signup.php');
            }
         } else{
             session_start();
             $error_message = "Password doesn't match the repeated password!";
             $_SESSION['error'] = $error_message;
             unset($_SESSION['authorization']);
             header('Location: ./signup.php');
         }
    } else{
        session_start();
        $error_message = "Fill in all the rquired fields";
        $_SESSION['error'] = $error_message;
        unset($_SESSION['authorization']);
        header('Location: ./signup.php');
    }
    
?>