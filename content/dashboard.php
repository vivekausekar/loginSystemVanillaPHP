    <?php if(isset($_SESSION['message'])) {
        echo $_SESSION['message'].'<br/>';
        unset($_SESSION['message']);
    } else { ?>
        <div class="section">
            <h1>Login System - User Dashboard</h1>            
        </div>
    <?php }
        //Cookie validate
        //if(isset($_COOKIE['user_session'])) {
            // echo '<pre>';
            // print_r($_COOKIE);
            // echo '<pre>';
            // print_r($_SESSION);
            // echo @session_id();
            //die;
        //}
    ?>
    
