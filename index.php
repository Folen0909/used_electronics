<?php
    require_once("./php/services_db.php");
    require_once("./php/items_db.php");
    require_once("./php/users_db.php");
    $services = $services_table->read();
    $items = $items_table->read();
?>

<!DOCTYPE html>
<html lang="hr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Used Electronics</title>
    <meta name="desription" content="Shop for used electronics, repair service and resale.">
</head>

<body>
    <div class="content">
        <nav>
            <h1>Used Electronics</h1>
            <button class="menu" type="button" aria-expanded="false">
                <img src="images/svg/menu.svg" alt="Menu icon">
            </button>
            <a href="" aria-label="Press for homepage">
                <span>Used Electronics</span>
            </a>
            <a href="php/admin.php" class="login" aria-label="Press to login">
                <img src="images/svg/login.svg" alt="Button for login" loading="lazy">
                <span>LOGIN</span>
            </a>
        </nav>


        <section class="about">
            <h2>About us</h2>
            <span>About us:</span>
            <ul>
                <li>We are small group of entusiast that started this as hobby and grew into small business.</li>
                <li>We enjoy everything about tech.</li>
                <li>Team is composed of tech geeks with different stages of education, and as such make great team.</li>
                <li>We are focused on saving old tech from being dumped in trash and forgotten.</li>
                <li>We are repairing, reselling and buying old and interesting tech.</li>
            </ul>
        </section>

        <section class="services">
            <h2>Services</h2>
            <span>Services:</span>
            <ul class="servicing">
                <?php while ($row = $services->fetch()) : ?>
                    <li class="service" id="<?= htmlspecialchars($row['service_id']) ?>">
                        <span>
                            <?= htmlspecialchars($row['service_name']) ?>
                        </span>
                        <span>
                            (<?= htmlspecialchars($row['service_price']) ?>,00 kn)
                        </span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </section>

        <section class="used">
            <h2>Used</h2>
            <span>For sale:</span>
            <ul class="items">
                <?php while ($row = $items->fetch()) : ?>
                    <li class="item" id="<?= htmlspecialchars($row['item_id']) ?>">
                        <span>
                            <?= htmlspecialchars($row['item_name']) ?>
                        </span>
                        <img class="item-img" src="<?= htmlspecialchars($row['item_image_url']) ?>" alt="<?= htmlspecialchars($row['item_name']) ?>" loading="lazy">
                        <span class="item-price">
                            Price: <?= htmlspecialchars($row['item_price']) ?>,00 kn
                        </span>
                    </li>
                <?php endwhile; ?>
    </div>
    </section>
    </div>

    <footer>
        <div>
            <a href="../index.php" aria-label="Press to go to top"><span>Used Electronics</span></a>
            <ul class="media-icons">
                <li>
                    <a href="https://www.instagram.com/">
                        <img src="images/svg/insta.svg" role="button" aria-label="Press to access Instagram page." alt="Instagram icon">
                    </a>
                </li>
                <li>
                    <a href="https://twitter.com/">
                        <img src="images/svg/twitter.svg" role="button" aria-label="Press to access Twitter page." alt="Twitter icon">
                    </a>
                </li>
                <li>
                    <a href="https://www.facebook.com/">
                        <img src="images/svg/fb.svg" role="button" aria-label="Press to access Facebook page." alt="Facebook icon">
                    </a>
                </li>
            </ul>
        </div>
        <div>
            <ul class="links">
                <li>
                    <a href="" aria-label="Press for more information">About us</a>
                </li>
                <li>
                    <a href="" aria-label="Press to see services and items">Services and Items</a>
                </li>
                <li>
                    <a href="" aria-label="Press to access contacts">Contact</a>
                </li>
            </ul>
        </div>
    </footer>

</body>

</html>