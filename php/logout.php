<?php

//Expire Cookie
setcookie('Admin', '', time() - 60*100000, '/');

//Redirect to page
header('Location: admin.php');

?>