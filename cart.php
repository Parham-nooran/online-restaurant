<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/cart.css">
    <title>Cart</title>
</head>
<body>
    <header>
        <!-- add Username and  Userimage here in instead of homepage-->
        <a class="go-back" href="./userpanel.php">Go Back</a>
        <a class="login" href="./login.php">Log out</a>
    </header>
    <div class="wrapper">
        <div class="header">
            <?php 
                require 'checkauthorization.php';
                require 'checkuserauthorization.php';
                require 'databaseconnection.php';
                $user_id = $_SESSION['ID'];
                $query = "SELECT ID FROM orders where UserID = '$user_id' AND Date_Time is Null";
                $rows = mysqli_query($connection, $query);
                $sum = 0;
                if(mysqli_num_rows($rows) > 0){
                    $row = $rows->fetch_assoc();
                    $order_id = $row['ID'];
                    $query = "SELECT FoodID, Number FROM order_food WHERE OrderID=$order_id";
                    $rows = mysqli_query($connection, $query);
                    while(($row = $rows->fetch_assoc())){
                        $food_id = $row['FoodID'];
                        $query_temp = "SELECT Price FROM foods WHERE ID='$food_id'";
                        $rows_res = mysqli_query($connection, $query_temp);
                        $row_temp = $rows_res->fetch_assoc();
                        $sum += $row['Number'] * $row_temp['Price'];
                    }
                }
            ?>
            <p class="total-price">Total:  <?php echo $sum;?>$</p>
            <div class="header-wrapper">
                <p class="column">Score</p>
                <p class="column">Price of Each</p>
                <p class="column">Number</p>
                <p class="column">Total Price</p>
            </div>
        </div>
        <?php
            unset($_SESSION['msg']);
            if(!empty($order_id)){
                $query = "SELECT * FROM foods WHERE ID IN (SELECT FoodID FROM order_food WHERE OrderID=$order_id)";
                $rows = mysqli_query($connection, $query);
                if(mysqli_num_rows($rows) > 0){
                    while(($row = $rows->fetch_assoc())){
                        $food_id = $row['ID'];
                        $query_temp = "SELECT Number FROM order_food WHERE OrderID=$order_id AND FoodID=$food_id";
                        $results = mysqli_query($connection, $query_temp);
                        $row_res = $results->fetch_assoc();
                        ?>
                            <div class="food-item">        
                                <div>
                                    <img class="food-image" src="data:image/jpg;charset=utf8;base64,<?php if($row['Image']!='') { echo base64_encode($row['Image']);} ?>" alt="food-image">
                                    <p class="info" id="name"><?php echo $row['Name']; ?></p>
                                </div>
                                <p class="info" id="description"><?php echo $row['Description']; ?></p>
                                <div class="inner-wrapper">
                                    <div class="upper">
                                        <p class="info"><?php echo $row['Score']; ?></p>
                                        <p class="info"><?php echo $row['Price']; ?></p>
                                        <p class="info"><?php echo $row_res['Number']; ?></p>
                                        <p class="info"><?php echo $row['Price'] * $row_res['Number']; ?></p>
                                    </div>
                                    <form class="lower" action="./removefromcart.php" method="post">
                                        <input type="hidden" name="orderID" value="<?php echo $order_id; ?>">
                                        <input type="hidden" name="foodID" value="<?php echo $food_id; ?>">
                                        <input class="remove" type="submit" value="Remove">
                                    </form>
                                </div>
                            </div>
                        <?php
                    }
                    ?>
                        <form action="./checkout.php" method="post">
                            <input type="hidden" name="orderID" value="<?php echo $order_id;?>">
                            <input class="checkout" type="submit" value="Checkout">
                        </form>
                    <?php   
                } else{
                    ?>
                        <div class="no-item">
                            <p class="no-item-column">No item here yet</p>
                        </div>
                    <?php
                }
            } else{
                ?>
                    <div class="no-item">
                        <p class="no-item-column">No item here yet</p>
                    </div>
                <?php
            }
        ?>
    </div>
</body>
</html>