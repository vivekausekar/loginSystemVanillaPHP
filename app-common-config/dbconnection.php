<?php
    //Create DB Connection
    if(!empty($server) && !empty($user) && isset($pass) && !empty($db)) {
        $con = new mysqli($server, $user, '', $db);
        if($con->connect_errno) {
            die('Unable to Connect' . $con->connect_error);
        }
    } else
        echo "<div style='color: red;font-size:20px;'>Need to Set database connection.</div>";
