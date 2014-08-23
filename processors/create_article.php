<?php
include './lib/functions.php';
include './lib/database.php';
check_login();

$title = mysql_real_escape_string($_POST['article_title']);
$body = mysql_real_escape_string($_POST['article_body']);
$datetime = mysql_real_escape_string($_POST['article_datetime']);

$title = preg_replace('/\s+/', '', $title);
$body = preg_replace('/\s+/', '', $body);
$filename = '';
$filext = '';

try {
    if (
        !isset($_FILES['upfile']['error']) ||
        is_array($_FILES['upfile']['error'])
    ) {
        throw new RuntimeException('Invalid parameters.');
    }
    switch ($_FILES['upfile']['error']) {
        case UPLOAD_ERR_OK:
            break;
        case UPLOAD_ERR_NO_FILE:
            throw new RuntimeException('No file sent.');
        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            throw new RuntimeException('Exceeded filesize limit.');
        default:
            throw new RuntimeException('Unknown errors.');
    }
    if ($_FILES['upfile']['size'] > 1000000) {
        throw new RuntimeException('Exceeded filesize limit.');
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    if (false === $ext = array_search(
        $finfo->file($_FILES['upfile']['tmp_name']),
        array(
            'jpg' => 'image/jpeg',
            'png' => 'image/png',
            'gif' => 'image/gif',
        ),
        true
    )) {
        throw new RuntimeException('Invalid file format.');
    }
    $filename = sha1_file($_FILES['upfile']['tmp_name']);
    $filext = $ext;
    if (!move_uploaded_file(
        $_FILES['upfile']['tmp_name'],
        sprintf('../uploads/%s.%s',
            $filename,
            $ext
        )
    )) {
        throw new RuntimeException('Failed to move uploaded file.');
    }

    echo 'File is uploaded successfully.';

} catch (RuntimeException $e) {

    echo $e->getMessage();    
}

echo $filename = "$filename.$filext";

if ($body !== '' && $title !== '') {
    create_article($title, $body, $datetime, $filename);
    header('location: ../index.php?success=Article Created');
} else {
    header('location: ../index.php?error=Article cant be created');
} 
?>