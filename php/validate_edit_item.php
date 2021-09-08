<?php

    include_once('./items_db.php');

    function test_input($data){
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

        if ($item_id == "" || $item_name == "" || $item_price == "") {
            setcookie("Error", true, time() + 10);
            header('Location: service.php');
        }
        if (isset($_POST['update'])){
            $items_table-> update($item_id, $item_name, $item_url, $item_price);
            header('Location: items.php');
        }
        elseif (isset($_POST['delete'])){
            $items_table-> deleteByID($item_id);
            header('Location: items.php');
        }
    }

?>