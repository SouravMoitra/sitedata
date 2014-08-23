<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Events</title>
        <link rel="stylesheet" href="events.css">
    </head>
    <body>
        <header class="">
            <div class="nav clearfix">
                <ul id="navmenu">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Event</a></li>
                    <li><a href="#">Achievements</a></li>
                    <li><a href="#">Gallery</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </header>
        <h2>Events</h2>
        <div class="container clearfix">
            <div class="informations clearfix">
                <h3>Informations</h3>
                <?php
                include './processors/lib/database.php';
                $query2 = "SELECT * FROM  informations ORDER BY created_at DESC LIMIT 3";
                $result2 = mysql_query($query2);
                $rows2 = mysql_num_rows($result2);
                if (!$result2)
                    die("Database access failed: " . mysql_error());
                $rows2 = mysql_num_rows($result2);
                for ($j = 0; $j < $rows2; ++$j) {
                    $row2 = mysql_fetch_row($result2);
                    echo <<<_END
                <div class="information-container">
                    <p> Sl. $row2[0] 
                        $row2[2] 
                    </p>
                    <strong class="date-time"> At: $row2[3] </strong>
                </div>
_END;
                }
                    ?>
            </div>
            <div class="articles">
                    <?php
                $query = "SELECT * FROM articles ORDER BY created_at DESC LIMIT 5";
                $result = mysql_query($query);
                $rows = mysql_num_rows($result);
                if (!$result)
                    die("Database access failed: " . mysql_error());
                $rows = mysql_num_rows($result);
                for ($i = 0; $i < $rows; ++$i) {
                    $row = mysql_fetch_row($result);
                    echo <<<_END
                <div class="article-container clearfix">
                    <h3>$row[1]</h3>
                    <p> 
                        <strong class="date-time"> Date & Time: $row[6] </strong>
                        <br/>
                        $row[2] 
                    </p>
                    <img src="./uploads/$row[7]" alt="image" width="320" height="240" class="article-image">
                </div>
_END;
                }
                ?>
            </div>
        </div>
    </body>
</html>
