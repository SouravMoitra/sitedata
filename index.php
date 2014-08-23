<?php
include './processors/lib/database.php';
include './processors/lib/functions.php';
check_login();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link rel="stylesheet" href="custom.css">
        <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/themes/smoothness/jquery-ui.css" />
        <link rel="stylesheet" href="jquery.datetimepicker.css">
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.1/jquery-ui.min.js"></script> 
        <script src="jquery.datetimepicker.js"></script>    
    </head>
    <body>
        <header>
            <h2>Dashboard</h2>
        </header>
        <?php
        if (isset($_GET['success'])) {
            echo "<div class='flash-success'><p>" . $_GET['success'] . "<p></div>";
        } elseif ($_GET['error']) {
            echo "<div class='flash-error'><p>" . $_GET['error'] . "<p></div>";
        }
        ?>
        <div class="clearfix">
            <div class="form-container form-container-wide">
                <p>Add a new article</p>
                <form action="processors/create_article.php" method="post" enctype="multipart/form-data">
                    <label>Title</label>
                    <input type="text" name="article_title" id="article-create-title" required autofocus>
                    <br/>
                    <label>Time & Date</label>
                    <input type="datetime" name="article_datetime" id="article-datetimepicker" required>
                    <br/>
                    <label for="article-create-textarea">Body</label>
                    <br/>
                    <textarea name="article_body" id="article-create-textarea" required></textarea>
                    <br/>
                    <label>Image</label>
                    <input type="file" name="upfile" id="file"><br>
                    <input type="submit">
                </form>
            </div>
            <div class="form-container form-container-3">
                <p>Destroy Articles</p>
                <form method="post" action="./processors/delete_article.php" >
                    <label class="label">Enter Title</label>
                    <input type="text" name="article_destroy" class="input-maximize" required >
                    <input type="submit" value="Destroy">
                </form>
            </div>
            <div class="form-container form-container-3">
                <p>Add Information</p>
                <form method="post" action="./processors/add_info.php" >
                    <label class="label">Enter Information</label>
                    <input type="text" name="info" required>
                    <input type="submit" value="create">
                </form>
            </div>
            <div class="form-container form-container-3" style="margin-right: 0">
                <p>Delete Information</p>
                <form method="post" action="./processors/delete_info.php" >
                    <label class="label">Enter ID</label>
                    <input type="text" name="id" required>
                    <br/>
                    <input type="submit" value="Delete">
                </form>
            </div>
        </div>
        <footer>
            <cite>Developed by <a href="http://facebook.com/sourav.moitra" target="blank">Sourav Moitra</a></cite>
        </footer>
        <script>
            jQuery('#article-datetimepicker').datetimepicker();
        </script>
    </body>
</html>
