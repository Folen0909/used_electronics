<?php
 
    include_once('users_db.php');
    
    function test_input($data) {
        
        $data = filter_var($data);
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $user_email = test_input($_POST["user_email"]);
        $user_password = md5(test_input($_POST["user_password"]));
        $users = $users_table->read();

        while ($user = $users->fetch()){
            if(($user['user_email'] == $user_email) &&
                ($user['user_password'] == $user_password) && $user['type'] == 2) {
                    setcookie("Admin",$user_email, time() + 300, '/');
                    header("Location: dashboard.php");
            }
            else {
                echo "<script type='text/javascript'>alert('Wrong Username or Password'); window.location='admin.php';</script>";
            }
        }
    }
?>