<?php
    //Load config
    require_once('app-common-config/variables.php');
    require_once('app-common-config/dbconnection.php');
    require_once('app-common-config/functions.php');

    //Session init
    @session_start();

    //Login, Register Script
    if(isset($_POST['Register']) && 'Register' == $_POST['Register']) {
        //Register script
        $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt); //Validate CSRF

        // Sanitize $_POST fields
        foreach ($_POST as $key => $value) {
            $_POST[$key] = sanitizePostData($value);
        }
        if($isValid) {
            //Is user exists
            $isExists=false;
            $stmt= $con->prepare("SELECT uname FROM users WHERE uname=?");
            $stmt->bind_param("s", $_POST['uname']);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    if($_POST['uname'] == $row['uname']);
                        $isExists=true;
                }
            }
            if($isExists) {
                $rmessage="<div style='color: red; font-size:20px;'>Username already exists.</div>";
            } else {
                //Upload image
                $path='/upload/images/'.time()."-".rand(1000, 9999)."-".$_FILES['uimg']['name'];
                $location=$base_path.$path;
                if(!move_uploaded_file($_FILES['uimg']['tmp_name'], $location))
                    echo "<script>alert('Unable to upload image file.')</script>"; //die;

                //Insert user
                $pwd=sha1($_POST['pwd']);
                $stmt= $con->prepare("INSERT INTO users (uname,pass,img) VALUES (?,?,?)");
                $stmt->bind_param("sss", $_POST['uname'], $pwd, $path);
                if($stmt->execute()) {
                    $rmessage="<div style='color: green; font-size:20px;'>User Registered SuccessFully.</div>";
                } else {
                    $rmessage="<div style='color: red; font-size:20px;'>Unable To Register User. $stmt->error </div>";
                }
            }
            $stmt->close();
        }
        else
        $rmessage= "<div style='color: red;font-size:20px;'>Invalid Request. Please check if reuest made is valid from allowed domain url.</div>"; //die;
    } else if(isset($_POST['Login']) && 'Login' == $_POST['Login']) {
        //Login script
        $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt); //Validate CSRF

        // Sanitize $_POST fields
        foreach ($_POST as $key => $value) {
            $_POST[$key] = sanitizePostData($value);
        }
        if($isValid) {
            //Is user exists
            $isExists=false;
            $pwd=sha1($_POST['password']);
            $stmt= $con->prepare("SELECT * FROM users WHERE uname=? AND pass=?");
            $stmt->bind_param("ss", $_POST['username'], $pwd);
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
            if($isExists) {
                header('location:dashboard.php');
            } else {
                $lmessage="<div style='color: red; font-size:20px;'>User account does not exists.</div>";
            }
        }
        else
        $lmessage= "<div style='color: red;font-size:20px;'>Invalid Request. Please check if reuest made is valid from allowed domain url.</div>"; //die

    } else if('/loginSystemVanillaPHP/index.php'==$_SERVER['REQUEST_URI'] OR '/loginSystemVanillaPHP/'==$_SERVER['REQUEST_URI']) {
    } else {
        $message= "<div style='color: red;font-size:20px;'>Invalid Request. Please check if reuest made is valid from allowed domain url.</div>"; //die;
    }

    //Display Page View
    require_once('app-common-config/header.php');
    require_once('content/index.php');
    require_once('app-common-config/footer.php');
