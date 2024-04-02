<?php

    // echo '<pre>'; print_r($_SERVER['PHP_SELF']); die;
    $isValid=false;
    $salt='loginSystemVanillaPHP';
    if(isset($_POST['Register']) && 'Register' == $_POST['Register']) {
        $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt);
        if($isValid)
            echo 1;
        else
            echo 0;
        die;

        $message="User Registered, Please Login.";
        $type="Success";

        $message="Username Already Exists.";
        $type="Error";





    } else if(isset($_POST['Login']) && 'Login' == $_POST['Login']) {
        $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt);
        if($isValid)
            echo 11;
        else
            echo 00;
        die;

        header('location:dashboard.php');

    } else if('/loginSystemVanillaPHP/index.php'==$_SERVER['PHP_SELF']) {
        
        $csrf_value=bin2hex(mt_rand().time());
        $csrf_token=sha1($salt.$csrf_value);
    } else {
        echo "Invalid Request. Please check if it's valid alloed domain url.";
    }
    // echo '<pre>'; print_r($csrf); die;

    //Check CSRF TOKEN validation
    function checkIsValidRequest($value, $token, $salt) {

        $csrf_token=sha1($salt.$value);
        if($csrf_token===$token)
            return true;
        else
            return false;

    }
?>
<!DocType HTML>
<html>
    <head>
        <title>Login System</title>
        <style>
            .container {
                height:auto;
                width:100%;
            }
            .form-container {
                height:auto;
                width:auto;
            }
            form {
                height:auto;
                width:50%;
            }
            h1 {
                background:#4696;
                padding: 10px;
                text-align:center;
            }
            h2 {
                background:#7867;
                padding:5px;
                border: solid 0.1px #000;
            }
            .success {
                color: green;
                font-size:7px;
            }
            .error {
                color: red;
                font-size:7px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="form-container">
                <h1>Login System</h1>
                <br/>
                <form style="float:left" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <h2>Register</h2>
                    <?php if(isset($rtype) && 'Success'==$rtype) {
                        echo "<div class='success'>". $rmessage ."</div>";
                    } else if(isset($rtype) && 'Error'==$rtype) {
                        echo "<div class='error'>". $rmessage ."</div>";
                    } ?>
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token;?>" />
                    <input type="hidden" name="csrf_value" value="<?php echo $csrf_value;?>" />
                    <br/><br/>

                    <label for="uname">Username</label>
                    <input id="uname" name="uname" type="email" maxlength="15" required/>
                    <br/><br/>

                    <label for="pwd">Password</label>
                    <input id="pwd" name="pwd" type="password" maxlength="8" required/>
                    <br/><br/>

                    <label for="uimg">User Image</label>
                    <input id="uimg" name="uimg" type="file" accept="image/png, image/jpeg, image/jpg" required/>
                    <br/><br/>

                    <input type="Submit" name="Register" value="Register" />
                </form>

                <form style="float:right" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <h2>Login</h2>
                    <?php if(isset($ltype) && 'Success'==$ltype) {
                        echo "<div class='success'>". $lmessage ."</div>";
                    } else if(isset($ltype) && 'Error'==$ltype) {
                        echo "<div class='error'>". $lmessage ."</div>";
                    } ?>
                    <input type="hidden" name="csrf_token" value="<?php echo $csrf_token;?>" />
                    <input type="hidden" name="csrf_value" value="<?php echo $csrf_value;?>" />
                    <br/><br/>

                    <label for="username">Username</label>
                    <input id="username" name="username" type="email" maxlength="15" required/>
                    <br/><br/>

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" maxlength="8" required/>
                    <br/><br/>

                    <input type="Submit" name="Login" value="Login" />
                </form>
            </div>
        </div>
    </body>
</html>
