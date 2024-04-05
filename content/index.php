
    <h1>Login System</h1>
    <?php if(isset($message)) {
        echo $message.'<br/>';
    }?>

    <form id="register" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
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
        <input id="uimg" onchange="validateSize(this)" name="uimg" type="file" accept="image/png, image/jpeg, image/jpg" required/>
        <br/>
        <span style="font-size:10px;color:blue;">Valid Up To 2MB</span>
        <br/><br/>

        <input type="Submit" name="Register" value="Register" />
    </form>

    <form id="login" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
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
