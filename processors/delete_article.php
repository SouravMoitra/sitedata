<?php

var_dump($_POST);
include './lib/functions.php';
include './lib/database.php';
check_login();

$article = mysql_real_escape_string($_POST['article_destroy']);
$article = preg_replace('/\s+/', '', $article);


$query = "select article_image from articles where title = '$article'";
$result = mysql_query($query);
if (!$result)
    die("Database access failed: " . mysql_error());
$row = mysql_fetch_row($result);
$img = $row[0];

unlink("../uploads/$img");

$query2 = "delete from articles where title = '$article'";

if (mysql_query($query2)) {
    header('location: ../index.php?success=Article Deleted');
} else {
    header('location: ../index.php?error=Article cant be deleted');
}
?>