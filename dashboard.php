<?php
    //Load config
    require_once('app-common-config/variables.php');
    require_once('app-common-config/dbconnection.php');
    require_once('app-common-config/functions.php');

    //Session init
    @session_start();

    
    //Validate Authentication
    if(!isset($_SESSION['user_id'])) {              //With session
        if(isset($_COOKIE['user'])) {               //With Cookie
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
        } else {
            header('location:index.php'); die;
        }
    }

    // echo '<pre>';
    // print_r($_COOKIE);
    // echo '<pre>';
    // print_r($_SESSION);
    // die;

    //Dashboard, Logout Script
    if(isset($_SESSION['user_id'])) {
        //Dashboard script
        $csrf_value=bin2hex(mt_rand().time());
        $csrf_token=sha1($salt.$csrf_value);

        //Logout script
        if(isset($_POST['Logout']) && 'Logout' == $_POST['Logout']) {
            $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt); //Validate CSRF
            // Sanitize $_POST fields
            foreach ($_POST as $key => $value) {
                $_POST[$key] = sanitizePostData($value);
            }
            if(!$isValid)
            $_SESSION['message']= "<div style='text-align:center;color: red;font-size:20px;'>Invalid Request. Please check if reuest made is valid from allowed domain url.</div>"; //die;
            else
                logout();
        }
    } else
    $_SESSION['message']= "<div style='text-align:center;color: red;font-size:20px;'>Tried with Invalid User Login, Please <a href='index.php'>Login</a> to View Dashboard Page.</div>"; //die;

    //Display Page View
    require_once('app-common-config/header.php');
    require_once('content/dashboard.php');
    require_once('app-common-config/footer.php');
