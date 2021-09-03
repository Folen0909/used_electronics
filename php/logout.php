<?php

    setcookie('Admin', '', time() - 60*100000, '/');

    header('Location: admin.php');

?>