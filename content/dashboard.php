
    <h1>Login System - User Dashboard</h1>
    <form id="user-nav" id="" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" >
        <?php csrfToken($salt);?>
        <img style="border-radius: 30px;" src="<?php echo $base_url.$_SESSION['uimg']?>" height="50" width="50">
        <br/>
        <label for="uname">Welcome, <?php if(isset($_SESSION['uname'])) echo htmlspecialchars($_SESSION['uname']);?></label>
        <br/>
        <input type="submit" name="Logout" value="Logout"></button>
    </form>

    <?php if(isset($message)) {
        echo $message.'<br/>';
    } else { ?>
        <div class="section">
            
        </div>
    <?php }?>
