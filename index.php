<?php
    //Load config
    require_once('app-common-config/variables.php');
    require_once('app-common-config/dbconnection.php');
    require_once('app-common-config/functions.php');
    //Session init
    @session_start();

    // echo '<pre>'; print_r($_SERVER); die;

    //Login, Register Script
    if(isset($_POST['Register']) && 'Register' == $_POST['Register']) {
        //Register script
        $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt);
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
        $isValid=checkIsValidRequest($_POST['csrf_value'], $_POST['csrf_token'], $salt);
        if($isValid) {
            //Is user exists
            $isExists=false;
            $pwd=sha1($_POST['password']);
            $stmt= $con->prepare("SELECT * FROM users WHERE uname=? AND pass=?");
            $stmt->bind_param("ss", $_POST['username'], $pwd);
            if($stmt->execute()) {
                $result = $stmt->get_result();
                // echo '<pre>'; print_r($result); die;
                while ($row = $result->fetch_assoc()) {
                    // echo '<pre>'; print_r($row); die;
                    // if($pwd === $row['pass']) {
                        $isExists=true;
                        $_SESSION['user_id']=$row['user_id'];
                        $_SESSION['uname']=$row['uname'];
                        $_SESSION['uimg']=$row['img'];
                    // }
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
    // echo '<pre>'; print_r($csrf); die;
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
                color: green; font-size:20px;
            }
            .error {
                color: red; font-size:20px;
            }
        </style>
    </head>
    <body>
        <div class="container">

            <div class="form-container">
                <h1>Login System</h1>
                <br/>
                <?php if(isset($message)) {
                    echo $message.'<br/>';
                }?>
                <form style="float:left" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                    <h2>Register</h2>
                    <?php if(isset($rmessage)) {
                        echo $rmessage;
                    }
                    csrfToken($salt);
                    ?>

                    <label for="uname">Username</label>
                    <input id="uname" name="uname" type="email" maxlength="100" required/>
                    <br/><br/>

                    <label for="pwd">Password</label>
                    <input id="pwd" name="pwd" type="password" maxlength="8" required/>
                    <br/><br/>

                    <label for="uimg">User Image</label>
                    <input id="uimg" onchange="validateSize()" name="uimg" type="file" accept="image/png, image/jpeg, image/jpg" required/>
                    <br/>
                    <span style="font-size:10px;color:blue;">Valid Up To 2MB</span>
                    <br/><br/>

                    <input type="Submit" name="Register" value="Register" />
                </form>

                <form style="float:right" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
                    <h2>Login</h2>
                    <?php if(isset($lmessage)) {
                        echo $lmessage;
                    }
                    csrfToken($salt);
                    ?>

                    <label for="username">Username</label>
                    <input id="username" name="username" type="email" maxlength="100" required/>
                    <br/><br/>

                    <label for="password">Password</label>
                    <input id="password" name="password" type="password" maxlength="8" required/>
                    <br/><br/>

                    <input type="Submit" name="Login" value="Login" />
                </form>
            </div>
        </div>
        <script type="text/javascript">
            function validateSize(input) {

            }
        </script>
    </body>
</html>
<?php
//Close connection
if(isset($con))
    $con->close();?>