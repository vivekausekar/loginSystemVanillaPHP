    <?php if(isset($_SESSION['message'])) {
        echo $_SESSION['message'].'<br/>';
        unset($_SESSION['message']);
    } else { ?>
        <div class="section">
            <h1>Login System</h1>

            <form id="register" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                <h2>Register</h2>
                <?php if(isset($rmessage)) {
                    echo $rmessage;
                }
                csrfToken($salt);
                ?>

                <label for="uname">Username<span class="mandetory">*</span></label>
                <input id="uname" name="uname" type="email" maxlength="100" required/>
                <br/><br/>

                <label for="pwd">Password<span class="mandetory">*</span></label>
                <input id="pwd" name="pwd" type="password" maxlength="8" required/>
                <br/><br/>

                <label for="uimg">User Image <span class="mandetory">*</span> <span style="font-size:10px;color:blue;"> (Valid Up To 2MB)</span> </label>
                <input id="uimg" onchange="validateSize(this)" name="uimg" type="file" accept="image/png, image/jpeg, image/jpg" required/>
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

                <label for="username">Username<span class="mandetory">*</span></label>
                <input id="username" name="username" type="email" maxlength="100" required/>
                <br/><br/>

                <label for="password">Password<span class="mandetory">*</span></label>
                <input id="password" name="password" type="password" maxlength="8" required/>
                <br/><br/>

                <input type="radio" id="remember_me" name="remember_me"/>
                <label for="remember_me">Remember Me</label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="forgot-password.php">Forgot Password?</a>
                <br/><br/>

                <input type="Submit" name="Login" value="Login" />
            </form>
        </div>
    <?php }?>
