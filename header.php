<div style="text-align: right;">
    <?php
    session_start();
    if (isset($_SESSION['user_email'])):
        ?>
        <a id="logout-btn" href="#">Logout</a>
    <?php else: ?>        

        <a href="login.php">Login</a>
        <a href="register.php">Register</a>
    <?php endif; ?>
</div>
