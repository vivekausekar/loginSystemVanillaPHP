<!DOCTYPE html>
<html>
    <head>
        <title>Login System</title>
		<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
        <link href="assets/css/custom.css" rel="stylesheet">
        <?php if(isset($_SESSION['user_id'])) {?>
            <style>
                .form-container {
                    margin: auto;
                }
                #user-nav {
                    text-align: center;
                    width:auto;
                    margin-top: -50px;
                    background:none;
                }
                .section {
                    text-align: center;
                }
                .user-account-menu {
                    list-style: none;
                    float: right;
                    background: lightskyblue;
                    margin-top: -30px;
                    padding: 5px;
                    display: none;
					position: absolute;
					right: 8px;
                }
                .active {
                    display:block;
                }
                ul.user-account-menu.active li {
                    padding: 10px;
                }
            </style>
        <?php } ?>
    </head>
    <body>
        <div class="container">
            <div class="form-container">
                <header>
                    <nav>
                        <!-- Navigation Links -->
                        <ul class="nav navbar-nav">
                            <li><a href="#"><img style="border-radius: 30px;" src="assets/img/logo.png" height=30 wisth=100 /></a></li>
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact</a></li>
                            <?php if(isset($_SESSION['user_id'])) {?>
                            <li style="margin-left: auto; padding: 10px; border-radius: 10px; background: lightblue;margin-top: 0px;">
                                <img style="border-radius: 30px;float: right;border: solid #8d8fe9 2px;" src="<?php if(isset($_SESSION['uimg'])) echo $base_url.$_SESSION['uimg']?>" height="50" width="50"/>
                                <br/>
                                <label for="uname">Welcome, <?php if(isset($_SESSION['uname'])) echo htmlspecialchars($_SESSION['uname']);?></label>
                            </li>
                            <li><span style="margin-right: 40px;font-size:45px;cursor:pointer; box-shadow: 0 5px 5px 0 rgba(0,0,0,0.24), 0 5px 5px 0 rgba(0,0,0,0.19);" onClick="menuToggle(this);">&equiv;</span></li>
                            <?php } else { ?>
                                <li style="margin-left: auto;"><a href="<?php echo $base_url;?>">Login</a></li>
                            <?php }?>
                        </ul>
                        <ul class="user-account-menu">
                            <?php if(isset($_SESSION['user_id'])) {?>
                                <li>
                                    <a href="dashboard.php">
                                        Dashboard
                                    </a>
                                </li>
                                <li>
                                    <a href="change-password.php">
                                        Change Password
                                    </a>
                                </li>
                                <li>
                                    <form id="user-nav" id="" action="<?php echo './dashboard.php';?>" method="POST" >
                                        <?php csrfToken($salt); ?>
                                        <input id="logout" type="submit" name="Logout" value="Logout"></button>
                                    </form>
                                </li>
                            <?php }?>
                        </ul>                        
                    </nav>
                </header>