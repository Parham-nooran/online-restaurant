<?php
    require 'checkauthorization.php';
    require 'databaseconnection.php';
    if(isset($_POST["submit"])){
        if((!empty($_FILES["image-file"]["name"])) && (!empty($_FILES["image-file"]["tmp_name"]))){
            $fileName = basename($_FILES["image-file"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
            if(!empty($fileName) && !empty($fileType)){
                $image = $_FILES['image-file']['tmp_name'];
                if(!empty($image)){
                    $imageContent = addslashes(file_get_contents($image));
                } else{
                    $imageContent = '';
                }
            }
        } else{
            $imageContent = '';
        }
        $name = $_POST['name'];
        $number = $_POST['number'];
        $score = $_POST['score'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $query = "INSERT INTO foods(Name, Number, Image, Score, Description, Price) VALUES ('$name', '$number', '$imageContent', '$score', '$description', '$price')";
        mysqli_query($connection, $query);
    }
    header('Location: ./adminpanel.php');
?>