<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/adminpanel.css" type="text/css">
    <title>Admin Panel</title>
</head>
<body>
    <header>
        <a class="login" href="./login.php">Log out</a>
    </header>
    <?php 
        require("databaseconnection.php");
        session_start();
        unset($_SESSION['userLogin']);
        unset($_SESSION['error']);
        require "databaseconnection.php";
        $query = "SELECT name, image FROM foods";
        $result = mysqli_query($connection, $query);
        ?>
            <?php
                while($row = $result->fetch_assoc()){
                    $index = 1;
                    ?>
                        <div class="wrapper">
                            <?php
                                while(($index < 4) && ($row = $result->fetch_assoc())){ 
                                    ?>
                                        <?php $index += 1; ?>
                                        <div class="inner-wrapper">
                                            <div class="image-wrapper">
                                                <img class="food-image" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" alt="image_box">
                                            </div>
                                            <form class="edit-form" method="post" action="./edit.php">
                                                <input class="edit" type="button" title="edit" name="Edit" value="Edit">
                                            </form>
                                            <form class="delete-form" method="post" class="delete-button" action="./delete.php">
                                                <input class="delete" type="button" title="delete" name="Delete" value="Delete">
                                            </form>
                                        </div>
                                    <?php 
                                } 
                            ?>
                            <div class="no-item-wrapper" onclick="location.href = './index.html'">
                                <div class="image-wrapper" >
                                    <img class="add-icon" src="./statics/add.png" alt="food-image">
                                    <p class="add-icon-caption">Add new item</p>
                                </div>
                            </div>
                        </div>
                    <?php
                }
            ?>
        <?php
    ?>
    <div class="wrapper">
        <div class="inner-wrapper">
            <div class="image-wrapper">
                <img class="food-image" src="./statics/Pizza.jpg" alt="food-image">
            </div>
            <div class='info-wrapper'>
                <p class="food-name">Pizza fdaslkfdjslkfj </p>
                <p class="description">dafdfasdf fdsafd sa fsadfds asd ff sda fsdfsd sdfsd dsf sdfdsaf sd fdsfd  sd sd fds fdsggrew teg grwe</p>
                <div class='num-info'>
                    <p class="score">Score: 5</p>
                    <img class="star-icon" src="./statics/star.png" alt="">
                    <p class="in-store">In Store: 12</p>
                </div>
            </div>
            <form class="edit-form" method="post" action="./edit.php">
                <input class="edit" type="button" title="edit" name="Edit" value="Edit">
            </form>
            <form class="delete-form" method="post" class="delete-button" action="./delete.php">
                <input class="delete" type="button" title="delete" name="Delete" value="Delete">
            </form>
        </div>
    </div>
    <script src="./script/script.js"></script>
</body>
</html>