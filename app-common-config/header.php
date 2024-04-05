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
                    text-align: right;
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
                        </ul>
                    </nav>
                </header>