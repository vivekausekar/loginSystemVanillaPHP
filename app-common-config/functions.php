<?php
    //Check CSRF TOKEN validation
    function checkIsValidRequest($value, $token, $salt) {

        $csrf_token=sha1($salt.$value);
        if($csrf_token===$token)
            return true;
        else
            return false;

    }

    //Logout
    function logout() {

        session_destroy();
        header('location:index.php');
    }

    //Create CSRF TOKEN
    function csrfToken($salt) {

        $csrf_value=bin2hex(mt_rand().time());
        $csrf_token=sha1($salt.$csrf_value);

        echo "<input type='hidden' name='csrf_token' value='$csrf_token' />
        <input type='hidden' name='csrf_value' value='$csrf_value' />
        <br/><br/>";
    }

    // Sanitize input data
    function sanitizePostData($input) {

        // Trim leading and trailing spaces
        $input = trim($input);
        
        // Remove HTML tags
        $input = strip_tags($input);
        
        // Sanitize input using filter_var()
        $input = filter_var($input, FILTER_SANITIZE_STRING);
        
        return $input;
    }