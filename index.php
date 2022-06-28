<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>HomePage</title>
</head>
<body>
    <header>
        <p class="title">HomePage</p>
        <a class="signup" href="./signup.php">Sign up</a>
        <a class="login" href="./login.php">Login</a>
    </header>
    <?php
        require "databaseconnection.php";
        session_start();
        unset($_SESSION['error']);
        unset($_SESSION['message']);
        unset($_SESSION['ID']);
        unset($_SESSION['authorization']);
        $query = "SELECT ID, Name, Number, Image, Score, Description FROM foods";
        $result = mysqli_query($connection, $query);
        $index = 1;
        while($row = $result->fetch_assoc()){
            ?>
                <div class="wrapper">
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
                                </div>
                            <?php 
                        } 
                    ?>
                </div>
            <?php
            $index = 1;
        }
    ?>
</body>
</html>