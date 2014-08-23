<?php

function set_session($user) {
    $_SESSION[$user] = true;
}

function check_login() {
    session_start();
    if (!isset($_SESSION['admin'])) {
        if (isset($_COOKIE['sessions1']) && isset($_COOKIE['sessions2'])) {
            set_session('admin');
            set_session($_COOKIE['sessions2']);
            setcookie('sessions1', 'admin', time() + 3600, '/');
            setcookie('sessions2', $_COOKIE['sessions2'], time() + 3600, '/');
        } else {
            header("location: login.php");
        }
    }
}

function create_article($title, $body, $datetime, $image) {
   $query = "INSERT INTO articles (title, body, created_at, article_datetime, user_id, article_image) VALUES ('$title', '$body', now(), '$datetime', 1, '$image')";
   if (!mysql_query($query)) {
       die(mysql_error());
   }
}
