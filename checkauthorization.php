<?php
    session_start();
    if(empty($_SESSION['authorization']) || $_SESSION['authorization'] == '' || empty($_SESSION['Username'])){
        header("Location: ./login.php");
    }
?>