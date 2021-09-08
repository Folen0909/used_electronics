<?php

    if (!isset($_COOKIE['Admin'])) {
        header("Location: admin.php");
    }

    if (file_exists("./services_db.php")) {
        include_once("./services_db.php");
    }

    $services = $services_table->read();

?>

<!DOCTYPE html>
<html land="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../style/style.css">
        <title>Services</title>
    </head>

    <body class="dashboard">
        <div class="sidenav">
            <a href="../index.php"><span>Used Electronics</span></a>
            <a href="./dashboard.php">Dashboard</a>
            <a href="" style="font-size: 20px;"><b>Services</b></a>
            <a href="./items.php">Items</a>
            <a href="./logout.php">Logout</a>
        </div>

        <section class="details">
            <h1>Services</h1>
            <div class="title">
                <span>Services</span>
                <input class="addbtn" type="button" value="New Service" onClick="document.location.href = './new_service.php'" />
            </div>

            <?php if (isset($_COOKIE["Error"])) : ?>
                <div class="error">
                    <p>Polje nije popunjeno!</p>
                </div>
            <?php endif; ?>

            <table class="table">
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                </tr>
                <?php while ($row = $services->fetch()) : ?>
                    <tr>
                        <form action="edit_service.php" method="post">
                            <td style="display:none;"><input type="hidden" name="service_id" value="<?= htmlspecialchars($row['service_id']) ?>">
                                <?= htmlspecialchars($row['service_id']) ?>
                            </td>
                            <td class="name"><input type="hidden" name="service_name" value="<?= htmlspecialchars($row['service_name']) ?>">
                                <?= htmlspecialchars($row['service_name']) ?>
                            </td>
                            <td><input type="hidden" name="service_price" value="<?= htmlspecialchars($row['service_price']) ?>">
                                <?= htmlspecialchars($row['service_price']) ?>,00 kn
                            </td>
                            <td width="50px"><button class="addbtn" type="submit" name="edit">Edit</button>
                        </form>
                    </tr>
                <?php endwhile; ?>
            </table>
        </section>
    </body>

</html>