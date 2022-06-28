<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/signup.css" type="text/css">
    <title>Sign up</title>
</head>
<body>
        <header>
            <a class="go-back" href="./index.php">Go Back</a>
        </header>
    <?php
        session_start();
        unset($_SESSION['userLogin']);
        if(!empty($_SESSION['error'])){
            echo '<div class="error">'.$_SESSION['error'].'</div>';
        }
        if(!empty($_SESSION['message'])){
            echo '<div class="message">'.$_SESSION['message'].'</div>';
        }
    ?>
    <div class="wrapper">
        <div class="inner-wrapper">
            <p class="title">Sign up</p>
            <form method="post" action="./signupprocess.php">
                <input class="input-box" type="text" name="Email" title="email" placeholder="Email">
                <input class="input-box" type="password" name="Password" title="password" placeholder="Password">
                <input class="input-box" type="password" name="Repeat-Password" title="Repeat password" placeholder="Repeat password">
                <input class="input-button" type="submit" title="login" value="Signup">
            </form>
        </div>
    </div>
</body>
</html>