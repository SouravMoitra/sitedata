<?php
    include './lib/database.php';
    include './lib/functions.php';
    $username = mysql_real_escape_string($_POST['user_email']);
    $password = mysql_real_escape_string(sha1(\md5($_POST['user_password'])));
    $query = "SELECT id FROM users WHERE  email= '" . $username . "' and pass = '" . $password . "';";
    if (\mysql_num_rows(mysql_query($query)) != 1) {
        echo "bar";
        header("location: ../login.php");
        setcookie('error', "wrong", time() + 20, '/');
    } else {
        session_start();
        set_session('admin');
        set_session($username);
        setcookie('sessions1', 'admin', time() + 3600, '/');
        setcookie('sessions2', $username, time() + 3600, '/');
    }
    header("location: ../index.php");
?>