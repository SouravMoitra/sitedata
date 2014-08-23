<?php

include './lib/functions.php';
include './lib/database.php';
check_login();

$id = trim(mysql_real_escape_string($_POST['id']));

echo $query = "delete from informations where id = $id";

if (mysql_query($query)) {
   header('location: ../index.php?success=Information Deleted');
} else {
   header('location: ../index.php?error=Information cant be deleted');
}

