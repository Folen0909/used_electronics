<?php

    if (!isset($_COOKIE['Admin'])){
        header("Location: admin.php");
    }

    if (file_exists("./items_db.php")) {
        include_once("./items_db.php");
    }

    $items = $items_table->read();

?>

<!DOCTYPE html>
<html land="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <title>Items</title>
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
            <h1>Items</h1>
            <div class="title">
                <span>Items</span>
                <button class="addbtn" type="button" value="New item"
                    onClick="document.location.href = './new_item.php'">New item</button>
            </div>

            <table class="table">
                <tr>
                    <th scope="col" width="35%">Image</th>
                    <th scope="col" width="35%">Name</th>
                    <th scope="col" width="30%">Price</th>
                </tr>
                <?php while ($row = $items->fetch()) :?>
                <tr>
                    <form action="edit_item.php" method="post">
                        <td style="display:none;"><input type="hidden" name="item_id"
                                value="<?= htmlspecialchars($row['item_id'])?>">
                            <?= htmlspecialchars($row['item_id']) ?>
                        </td>
                        <td><input type="hidden" name="item_image_url" value="<?= htmlspecialchars($row['item_image_url'])?>">
                            <img src="<?= htmlspecialchars($row['item_image_url'])?>" loading="lazy"></td>
                        <td><input type="hidden" name="item_name" value="<?= htmlspecialchars($row['item_name'])?>">
                            <?= htmlspecialchars($row['item_name']) ?>
                        </td>
                        <td><input type="hidden" name="item_price" value="<?= htmlspecialchars($row['item_price'])?>">
                            <?= htmlspecialchars($row['item_price'])?>,00 kn
                        </td>
                        <td width="50px"><button class="addbtn" type="submit" name="edit">Edit</button>
                    </form>
                </tr>
                <?php endwhile;?>
            </table>
        </section>
    </body>

</html>