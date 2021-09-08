<?php

    include_once('./items_db.php');

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){

        $item_name = test_input($_POST["item_name"]);
        $item_url = test_input($_POST["item_image_url"]);
        $item_price = test_input($_POST["item_price"]);

        if ($item_name == "" || $item_price == "") {
            setcookie("Error", true, time() + 10);
            header("Location: new_item.php"); 
        } else {
            $items_table->insert($item_name, $item_url, $item_price);
            header("Location: items.php");
        }
        
    }

?>