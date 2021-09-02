<?php
    if (!isset($_COOKIE['Admin'])) {
        header("Location: admin.php");
    }
?>

<!DOCTYPE html>
<html land="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" Href="../style/style.css">
        <title>New item</title>
    </head>

    <body class="dashboard">
        <div class="sidenav">
            <a href="../index.php"><span>Used Electronics</span></a>    
            <a href="./dashboard.php">Dashboard</a>
            <a href="./services.php">Services</a>
            <a href="" style="font-size: 20px;"><b>Items</b></a>
            <a href="./logout.php">Logout</a>
        </div>

        <section class="details">
            <div>
                <h1>New item</h1>
                <span>New item</span>
            </div>
            
            <form class="add_item" action="validate_new_item.php" method="post">
                <p>
                    <label for="text">Name: </label>
                    <input class="textinput" type="text" name="item_name" id="item_name" 
                        placeholder="Name">
                </p>
                <p>
                    <label for="text">Image URL: </label>
                    <input class="textinput" type="url" name="item_image_url" id="item_image_url"
                        placeholder="Image URL">
                </p>
                <p>
                    <label for="number">Price: </label>
                    <input class="textinput" type="number" name="item_price" id="item_price"
                        placeholder="Price">
                </p>

                <input class="addbtn" type="submit" value="Add new item">
        
            </form>
        </section>
    </body>
</html>