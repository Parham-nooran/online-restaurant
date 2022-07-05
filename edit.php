<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./style/edit.css" type="text/css"></link>
        <title>Edit Food Item</title>
    </head>
    <body>
        <header>
            <a class="go-back" href="./adminpanel.php">Go Back</a>
            <a class="login" href="./login.php">Log out</a>
        </header>
        <?php
            require 'checkauthorization.php';
            require 'checkadminauthorization.php';
            require 'databaseconnection.php';
            if(isset($_POST["submit"])){
                $id = $_POST['ID'];
                $query = "SELECT * FROM foods where ID = '$id'";
                $result = mysqli_query($connection, $query);
                $row = $result->fetch_assoc();
            }
            ?>
                <div class="main" id="main">
                    <div class="colored">
                        <br>
                        <div class="dropzone">
                            <form action="./update.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="ID" value="<?php echo $id;?>">
                                <img id="image-preview" class="uploaded-image" title="upload" src="data:image/jpg;charset=utf8;base64,<?php if($row['Image']!='') { echo base64_encode($row['Image']);} ?>">
                                <input name="image-file" id="file-input" title="Browse File to Upload" class="input" type="file">
                                <input class="name" type="text" title="name" name="name" placeholder="Name" value="<?php echo $row['Name'];?>">
                                <input class="description" type="text" name="description" title="description" placeholder="Description" value="<?php echo $row['Description'];?>"><br>
                                <label for="in-store">In Store:</label>
                                <input id="in-store" type="number" name="number" min="0" max="25665" value="<?php echo $row['Number'];?>">
                                <label for="score">Score</label>
                                <input id="score" type="number" name="score" min="0" max="5" value="<?php echo $row['Score'];?>">
                                <img class="star-icon" src="./statics/star.png" alt=""><br>
                                <label for="price">Price:</label>
                                <input id="price" name="price" type="number" step='0.1' min='0.0' value="<?php echo $row['Price'];?>">
                                <input class="add-button" name="submit" type="submit" value="Edit">
                            </form> 
                        </div>
                    </div>
                </div>
            <?php
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="./script/add.js"></script>
    </body>
</html>