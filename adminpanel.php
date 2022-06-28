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
        require 'checkauthorization.php';
        require "databaseconnection.php";
        unset($_SESSION['error']);
        $query = "SELECT ID, Name, Number, Image, Score, Description FROM foods";
        $result = mysqli_query($connection, $query);
        $index = 2;
        ?>
            <div class="wrapper">
                <div class="no-item-wrapper" onclick="location.href = './add.php'">
                    <div class="image-wrapper" >
                        <img class="add-icon" src="./statics/add.png" alt="food-image">
                        <p class="add-icon-caption">Add new item</p>
                    </div>
                </div>
        <?php
        while($row = $result->fetch_assoc()){
            if($index != 2) { echo '<div class="wrapper">';}
            ?>
                <div class="inner-wrapper">
                    <div class="image-wrapper">
                        <img class="food-image" src="data:image/jpg;charset=utf8;base64,<?php if($row['Image']!='') { echo base64_encode($row['Image']);} ?>" alt="food-image">
                    </div>
                    <div class='info-wrapper'>
                        <p class="food-name"><?php echo $row['Name'] ?></p>
                        <p class="description"><?php echo $row['Description'] ?></p>
                        <div class='num-info'>
                            <p class="score">Score: <?php echo $row['Score'] ?> </p>
                            <img class="star-icon" src="./statics/star.png" alt="">
                            <p class="in-store">In Store: <?php echo $row['Number'] ?></p>
                        </div>
                    </div>
                    <form class="edit-form" method="post" action="./edit.php">
                        <input type="hidden" name='ID' value='<?php echo $row['ID']; ?>'>
                        <input class="edit" name='submit' type="submit" title="edit" name="Edit" value="Edit">
                    </form>
                    <form class="delete-form" method="post" action="./delete.php">
                        <input type="hidden" name='ID' value='<?php echo $row['ID']; ?>'>
                        <input class="delete" name='submit' type="submit" title="delete" name="Delete" value="Delete">
                    </form>
                </div>
                    <?php
                        while(($index < 4) && ($row = $result->fetch_assoc())){ 
                            ?>
                                <?php $index += 1; ?>
                                <div class="inner-wrapper">
                                    <div class="image-wrapper">
                                        <img class="food-image" src="data:image/jpg;charset=utf8;base64,<?php if($row['Image']!='') { echo base64_encode($row['Image']);} ?>" alt="food-image">
                                    </div>
                                    <div class='info-wrapper'>
                                        <p class="food-name"><?php echo $row['Name'] ?></p>
                                        <p class="description"><?php echo $row['Description'] ?></p>
                                        <div class='num-info'>
                                            <p class="score">Score: <?php echo $row['Score'] ?> </p>
                                            <img class="star-icon" src="./statics/star.png" alt="">
                                            <p class="in-store">In Store: <?php echo $row['Number'] ?></p>
                                        </div>
                                    </div>
                                    <form class="edit-form" method="post" action="./edit.php">
                                        <input type="hidden" name='ID' value='<?php echo $row['ID']; ?>'>
                                        <input class="edit" name='submit' type="submit" title="edit" name="Edit" value="Edit">
                                    </form>
                                    <form class="delete-form" method="post" action="./delete.php">
                                        <input type="hidden" name='ID' value='<?php echo $row['ID']; ?>'>
                                        <input class="delete" name='submit' type="submit" title="delete" name="Delete" value="Delete">
                                    </form>
                                </div>
                            <?php 
                        } 
                    ?>
                </div>
            <?php
            $index = 1;
        }
    ?>
    <script src="./script/script.js"></script>
</body>
</html>