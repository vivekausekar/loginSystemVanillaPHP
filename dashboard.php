<?php
    //Load config
    require_once('app-common-config/variables.php');
    require_once('app-common-config/dbconnection.php');
    require_once('app-common-config/functions.php');
    //Session init
    @session_start();

    // echo '<pre>'; print_r($_SESSION); die;
    //Dashboard, Logout Script
    if(isset($_SESSION['user_id'])) {
        $csrf_value=bin2hex(mt_rand().time());
        $csrf_token=sha1($salt.$csrf_value);

        if(isset($_POST['Logout']) && 'Logout' == $_POST['Logout']) {

            $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt);
            if(!$isValid)
                $message= "<div style='color: red;font-size:20px;'>Invalid Request. Please check if reuest made is valid from allowed domain url.</div>"; //die;
            else
                logout();
        }
    } else
        $message= "<div style='color: red;font-size:20px;'>Tried with Invalid User Login, Please <a href='index.php'>Login</a> to View Dashboard Page.</div>"; //die;
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
                width:49%;
                padding:5px;
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
                font-size:20px;
            }
            .error {
                color: red;
                font-size:20px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="form-container">
                <h1>Login System - User Dashboard</h1>
                <?php if(isset($message)) {
                    echo $message.'<br/>';
                } else { ?>
                    <br/>
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" style="margin: 0 auto;text-align: center;">
                        <?php csrfToken($salt);?>

                        <label for="uname">Welcome, <?php if(isset($_SESSION['uname'])) echo $_SESSION['uname'];?></label>
                        <br/><br/>
                        <img src="<?php echo $base_url.$_SESSION['uimg']?>" height="200" width="200">
                        <br/><br/>

                        <input type="submit" name="Logout" value="Logout"></button>
                    </form>
                <?php }?>
            </div>
        </div>
    </body>
</html>
<?php
//Close connection
if(isset($con))
    $con->close();?>