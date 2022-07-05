<?php
    if(empty($_SESSION['ID']) || $_SESSION['authorization'] != 1){
        header("Location: ./login.php");
    }
?>