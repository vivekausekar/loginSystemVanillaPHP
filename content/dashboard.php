    <?php if(isset($_SESSION['message'])) {
        echo $_SESSION['message'].'<br/>';
        unset($_SESSION['message']);
    } else { ?>
        <div class="section">
            <h1>Login System - User Dashboard</h1>            
        </div>
    <?php } ?>
    
