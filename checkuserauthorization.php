<?php
    if(empty($_SESSION['ID']) || $_SESSION['authorization'] != 0){
        header("Location: ./login.php");
    }
?>