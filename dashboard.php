<?php
    //Load config
    require_once('app-common-config/variables.php');
    require_once('app-common-config/dbconnection.php');
    require_once('app-common-config/functions.php');

    //Session init
    @session_start();

    //Dashboard, Logout Script
    if(isset($_SESSION['user_id'])) {
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
                $message= "<div style='color: red;font-size:20px;'>Invalid Request. Please check if reuest made is valid from allowed domain url.</div>"; //die;
            else
                logout();
        }
    } else
        $message= "<div style='color: red;font-size:20px;'>Tried with Invalid User Login, Please <a href='index.php'>Login</a> to View Dashboard Page.</div>"; //die;

    //Display Page View
    require_once('app-common-config/header.php');
    require_once('content/dashboard.php');
    require_once('app-common-config/footer.php');
