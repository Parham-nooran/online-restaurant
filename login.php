<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/adminlogin.css" type="text/css">
    <link rel="stylesheet" href="style/login.css">
    <title>Login</title>
</head>
<body>
        <header>
            <a class="go-back" href="./index.php">Go Back</a>
        </header>
    <?php
        session_start();
        unset($_SESSION['authorization']);
        unset($_SESSION['ID']);
        if(!empty($_SESSION['error'])){
            echo '<div class="error">'.$_SESSION['error'].'</div>';
        }
    ?>
    <div class="wrapper">
        <div class="inner-wrapper">
            <p class="title">Login</p>
            <form method="post" action="./loginprocess.php">
                <input class="input-box" type="text" name="Username" title="username" placeholder="Username">
                <input class="input-box" type="password" name="Password" title="password" placeholder="Password">
                <input class="input-button" type="submit" title="login" value="Login">
            </form>
        </div>
    </div>
</body>
</html>