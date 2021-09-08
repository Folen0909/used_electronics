<?php

    include_once('./services_db.php');

    function test_input($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $service_id = test_input($_POST["service_id"]);
        $service_name = test_input($_POST["service_name"]);
        $service_price = test_input($_POST["service_price"]);

        if ($service_id == "" || $service_name == "" || $service_price == "") {
            setcookie("Error", true, time() + 10);
            header('Location: service.php');
        }
        if (isset($_POST['update'])){
            $services_table-> update($service_id, $service_name, $service_price);
            header('Location: services.php');
        }
        elseif (isset($_POST['delete'])){
            $services_table-> deleteByID($service_id);
            header('Location: services.php');
        }
    }

?>