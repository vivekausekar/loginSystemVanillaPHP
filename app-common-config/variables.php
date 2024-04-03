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
    // echo '<pre>'; print_r($_SERVER); die;    

    $app_name='/loginSystemVanillaPHP';
    $base_path=$_SERVER['DOCUMENT_ROOT'].$app_name;
    if('localhost'==$_SERVER['HTTP_HOST'])
        $base_url='http://'.$_SERVER['HTTP_HOST'].$app_name;
    else
        $base_url='http://'.$_SERVER['HTTP_HOST'];
