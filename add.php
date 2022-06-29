<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/add.css" type="text/css"></link>
        <title>Add New Foo</title>
    </head>
    <body>
        <?php
            require 'checkauthorization.php';
        ?>
        <header>
            <a class="go-back" href="./adminpanel.php">Go Back</a>
            <a class="login" href="./login.php">Log out</a>
        </header>
        <div class="main" id="main">
            <div class="colored">
                <br>
                <div class="dropzone">
                    <form action="./save.php" method="post" enctype="multipart/form-data">
                        <img id='image-preview' title="upload" src="./statics/upload.png" class="upload-image">
                        <p class="caption">Browse Image to Upload</p>
                        <input name="image-file" id="file-input" title="Browse File to Upload" class="input" type="file">
                        <input class="name" type="text" title="name" name="name" placeholder="Name">
                        <input class="description" type="text" name="description" title="description" placeholder="Description"><br>
                        <label for="in-store">In Store:</label>
                        <input id="in-store" type="number" name="number" min="0" max="25665" value="0">
                        <label for="score">Score:</label>
                        <input id="score" type="number" name="score" min="0" max="5" value="0">
                        <img class="star-icon" src="./statics/star.png" alt=""><br>
                        <label for="price">Price:</label>
                        <input id="price" name="price" type="number" step='0.1' min='0.0' value='0.0'>
                        <input class="add-button" name="submit" type="submit" value="Add">
                    </form> 
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="./script/add.js"></script>
    </body>
</html>