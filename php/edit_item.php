<?php

    if (!isset($_COOKIE['Admin'])) {
        header("Location: admin.php");
    }

    include_once('./items_db.php');

    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $item_id = test_input($_POST["item_id"]);
        $item_name = test_input($_POST["item_name"]);
        $item_url = test_input($_POST["item_image_url"]);
        $item_price = test_input($_POST["item_price"]);
    }

?>

<!DOCTYPE html>
<html land="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width= device-width, initial-scale = 1.0">
        <link rel="stylesheet" Href="../style/style.css">
        <title>Edit item</title>
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
                <h1>Edit item</h1>
                <span>Edit item</span>
            </div>

            <form action="validate_edit_item.php" method="post">
                <p style="display:none;">
                    <label for="text">ID: </label>
                    <input type="text" name="item_id" id="item_id" value="<?php echo $item_id ?>">
                </p>
                <p>
                    <label for="text">Name: </label>
                    <input class="textinput" id="edit_input" type="text" name="item_name" id="item_name" value="<?php echo $item_name ?>" required>
                </p>
                <p>
                    <label for="text">Image URL: </label>
                    <input class="textinput" id="edit_input" type="text" name="item_image_url" id="item_image_url" value="<?php echo $item_url ?>">
                </p>
                <p>
                    <label for="number">Price: </label>
                    <input class="textinput" id="edit_input" type="number" name="item_price" id="item_price" value="<?php echo $item_price ?>" required>
                </p>
                <button class="addbtn" name='update' value="Edit" type="submit">Edit</button>
                <button class="addbtn" name='delete' value="Delete" type="submit">Delete</button>
            </form>
        </section>
    </body>
</html>