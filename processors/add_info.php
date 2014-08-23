<?php

include './lib/functions.php';
include './lib/database.php';

check_login();

$info = mysql_real_escape_string($_POST['info']);
$info = preg_replace('/\s+/', '', $info);

$query = "insert into informations (user_id, info) values (1, '$info')";

if (mysql_query($query)) {
    header('location: ../index.php?success=Information Added');
} else {
    header('location: ../index.php?error=Information cant be added');
}
?>
