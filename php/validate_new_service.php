<?php

    include_once('./services_db.php');

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $service_name = test_input($_POST["service_name"]);
        $service_price = test_input($_POST["service_price"]);

        if ($service_name == "" || $service_price == "") {
            setcookie("Error", true, time() + 10);
            header("Location: new_services.php");
        } else {
            $services_table->insert($service_name, $service_price);
            header("Location: services.php");
        }  
    }

?>