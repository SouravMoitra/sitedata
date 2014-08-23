<?php
    include './processors/lib/functions.php';
    if (isset($_COOKIE['sessions1']) && isset($_COOKIE['sessions2'])) {
        set_session('admin');
        set_session($_SESSION['sessions2']);
        setcookie('sessions1', 'admin', time()+3600, '/');
        setcookie('sessions2',$_COOKIE['sessions2'], time()+3600, '/');
        header("location:index.php");
    } 

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="custom.css">
        <title>Login</title>
    </head>
    <body>
        <header>
            <h2>Admin Login Screen</h2>
        </header>
        <?php
            if ( isset($_COOKIE['error'])) {
                echo "<div class='flash-error'><p>OOps! username or password is wrong<p></div>";
            }
        ?>
        <div class="form-container">
            <form action="processors/login_proc.php" method="post">
                <label for="user-email-input" class="form-label">Email</label>
                <input type="email" name="user_email" id="user-email-input" required autofocus><br/>
                <label for="user-password-input" class="form-label">Password</label>
                <input type="password" name="user_password" id="user-password-input" required><br/>
                <input type="submit" value="Login"><br/>
            </form>
        </div>
        <footer>
            <cite>Developed by <a href="http://facebook.com/sourav.moitra" target="blank">Sourav Moitra</a></cite>
        </footer>
    </body>
</html>
