<?php
    //CSRF variables
    $isValid=false;
    $salt='loginSystemVanillaPHP';

    //DB variables
    $server='localhost';
    $user='root';
    $pass='';
    $db='login_system';

    //App variables
    $app_name='/loginSystemVanillaPHP';
    $base_path=$_SERVER['DOCUMENT_ROOT'].$app_name;
    if('localhost'==$_SERVER['HTTP_HOST']) {                //Local OR Development environment
        $base_url='http://'.$_SERVER['HTTP_HOST'].$app_name;
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
    }
    else {                                                  //Live OR Production environment
        $base_url='http://'.$_SERVER['HTTP_HOST'];
        error_reporting(0);
        ini_set('display_errors', 0);
    }

    // echo '<pre>'; print_r($_SERVER); die;
