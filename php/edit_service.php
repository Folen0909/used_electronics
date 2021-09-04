<?php

    if (!isset($_COOKIE['Admin'])) {
        header("Location: admin.php");
    }

    include_once('./services_db.php');

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $service_id = test_input($_POST["service_id"]);
        $service_name = test_input($_POST["service_name"]);
        $service_price = test_input($_POST["service_price"]);
    }

?>

<!DOCTYPE html>
<html land="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width= device-width, initial-scale = 1.0">
        <link rel="stylesheet" Href="../style/style.css">
        <title>Edit service</title>
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
                <h1>Edit service</h1>
                <span>Edit service</span>
            </div>

            <form action="validate_edit_service.php" method="post">
                <p style="display:none;">
                    <label for="text">ID: </label>
                    <input type="text" name="service_id" id="service_id" value="<?php echo $service_id?>">
                </p>
                <p>
                    <label for="text">Name: </label>
                    <input class="textinput" id="edit_input" type="text" name="service_name" id="service_name" 
                    value="<?php echo $service_name?>" required>
                </p>
                <p>
                    <label for="number">Price: </label>
                    <input class="textinput" id="edit_input" type="number" name="service_price" id="service_price"
                        value="<?php echo $service_price?>" required>
                </p>
                <button class="addbtn" name='update' value="Edit" type="submit">Edit</button>
                <button class="addbtn" name='delete' value="Delete" type="submit">Delete</button>
            </form>
        </section>
    </body>
</html>