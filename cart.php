<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/cart.css">
    <title>Document</title>
</head>
<body>
    <header>
        <!-- add Username and  Userimage here in instead of homepage-->
            <a class="go-back" href="./userpanel.php">Go Back</a>
        <a class="login" href="./login.php">Log out</a>
    </header>
    <div class="wrapper">
        <div class="header">
            <div class="header-wrapper">
                <p class="column">Score</p>
                <p class="column">Price of Each</p>
                <p class="column">Number</p>
                <p class="column">Total Price</p>
            </div>
        </div>
        <div class="food-item">        
            <div>
                <img class="food-image" src="./statics/Pizza.jpg" alt="food-image">
                <p class="info" id="name">Pizza Testino</p>
            </div>
            <p class="info" id="description">Chert</p>
            <div class="inner-wrapper">
                <div class="upper">
                    <p class="info">4</p>
                    <p class="info">12</p>
                    <p class="info">5</p>
                    <p class="info">60</p>
                </div>
                <form class="lower" action="./removefromcart.php">
                    <input class="remove" type="submit" value="Remove">
                </form>
            </div>
        </div>
    </div>
</body>
</html>