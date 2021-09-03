<?php

    if (!isset($_COOKIE['Admin'])){
        header("Location: admin.php");
    }

?>

<!DOCTYPE html>
<html land="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <title>Dashboard</title>
    </head>

    <body class="dashboard">
        <div class="sidenav">
            <a href="../index.php"><span>Used Electronics</span></a>    
            <a href="" style="font-size: 20px;"><b>Dashboard</b></a>
            <a href="./services.php">Services</a>
            <a href="./items.php">Items</a>
            <a href="./logout.php">Logout</a>
        </div>
                
        <div class="details">
            <span>User info</span>
            <p class="info">
                <?php echo "Admin profil:  " . $_COOKIE["Admin"]; ?><br>
            </p>
        </div>
    </body>

</html>