<!DOCTYPE html>
<html>
    <head>
        <title>Login System</title>
        <link href="assets/css/custom.css" rel="stylesheet">
        <?php if('/loginSystemVanillaPHP/dashboard.php'==$_SERVER['REQUEST_URI']) {?>
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
                form {
                    min-height: auto;
                }
                .user-account-menu {
                    list-style: none;
                    float: right;
                    background: deepskyblue;
                    margin-top: -30px;
                    padding: 5px;
                    display: none;
                }
                .active {
                    display:block;
                }
                ul.user-account-menu.active li {
                    padding: 10px;
                }
                h1 {
                    position:fixed;
                }
                #logout {
                    width: 100px;
                    height: 30px;
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
                            <li><a href="#"><img src="assets/img/logo.png" height=30 wisth=100 /></a></li>
                            <li class="active"><a href="#">Home</a></li>
                            <li><a href="#">Services</a></li>
                            <li><a href="#">About US</a></li>
                            <li><a href="#">Contact</a></li>
                            <?php if(isset($_SESSION['user_id'])) {?>
                            <li style="margin-left: auto;">
                                <img style="border-radius: 30px;float: right;" onclick="menuToggle();" src="<?php if(isset($_SESSION['uimg'])) echo $base_url.$_SESSION['uimg']?>" height="50" width="50"/>
                                <br/>
                                <label for="uname">Welcome, <?php if(isset($_SESSION['uname'])) echo htmlspecialchars($_SESSION['uname']);?></label>
                            </li>
                            <?php }?>
                        </ul>
                        <ul class="user-account-menu">
                            <?php if(isset($_SESSION['user_id'])) {?>
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