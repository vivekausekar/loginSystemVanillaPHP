<?php
    //Load config
    require_once('app-common-config/variables.php');
    require_once('app-common-config/dbconnection.php');
    require_once('app-common-config/functions.php');

    //Session init
    @session_start();

    //Validate Authentication
    if(!isset($_SESSION['user_id']) && !isset($_COOKIE['user'])) {          //No session & cookies
        //Redirect to forgot password
        header('location: forgot-password.php'); die;
    } else if(!isset($_SESSION['user_id']) && isset($_COOKIE['user'])) {    //With Cookie
        //Is user exists
        $isExists=false;
        $pwd=sha1($_POST['password']);
        $stmt= $con->prepare("SELECT * FROM users WHERE user_id=?");
        $stmt->bind_param("i", $_COOKIE['user']);
        if($stmt->execute()) {
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                // echo '<pre>'; print_r($row); die;
                $isExists=true;
                $_SESSION['user_id']=$row['user_id'];
                $_SESSION['uname']=$row['uname'];
                $_SESSION['uimg']=$row['img'];
            }
        }
    }

    //Display view
    require_once('app-common-config/header.php');
    require_once('content/change-password.php');
    require_once('app-common-config/footer.php');
