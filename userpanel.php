<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/userpanel.css" type="text/css">
    <title>User Panel</title>
</head>
<body>
    <header>
        <!-- add Username and  Userimage here in instead of homepage-->
        <a class="cart" href="./cart.php">Cart</a>
        <a class="history" href="./history.php">History</a>
        <a class="login" href="./login.php">Log out</a>
    </header>
    <?php 
        // require 'checkauthorization.php';
        require "databaseconnection.php";
        unset($_SESSION['error']);
        $query = "SELECT ID, Name, Number, Image, Score, Description FROM foods";
        $result = mysqli_query($connection, $query);
        $index = 2;
        
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
                        <form class="add-form" method="post" action="./addtocart.php">
                            <input type="hidden" name='ID' value='<?php echo $row['ID']; ?>'>
                            <input class="add" name='submit' type="submit" title="Add" name="Add" value="Add to Cart">
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
                                        <form class="add-form" method="post" action="./addtocart.php">
                                            <input type="hidden" name='ID' value='<?php echo $row['ID']; ?>'>
                                            <input class="add" name='submit' type="submit" title="Add" name="Add" value="Add to Cart">
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
</body>
</html>