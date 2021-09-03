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
        <title>New service</title>
    </head>

    <body class="dashboard">
        <div class="sidenav">
            <a href="../index.php"><span>Used Electronics</span></a>    
            <a href="./dashboard.php">Dashboard</a>
            <a href="" style="font-size: 20px;"><b>Services</b></a>
            <a href="./items.php" >Items</a>
            <a href="./logout.php">Logout</a>
        </div>

        <section class="details">
            <div>
                <h1>New service</h1>
                <span>New service</span>
            </div>
            
            <form class="add_service" action="validate_new_service.php" method="post">
                <p>
                    <label for="text">Name: </label>
                    <input class="textinput" type="text" name="service_name" id="service_name" 
                        placeholder="Name" required>
                </p>
                <p>
                    <label for="number">Price: </label>
                    <input class="textinput" type="number" name="service_price" id="service_price"
                        placeholder="Price" required>
                </p>

                <button class="addbtn" type="submit" value="Add new service">Add new service</button>
        
            </form>
        </section>
    </body>
</html>