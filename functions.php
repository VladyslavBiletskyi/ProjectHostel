<?php
$dbhost = 'localhost';
$dbname = 'projpract';
$dbuser = 'project';
$dbpass = 'project';

$connection = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
if ($connection->connect_error) die($connection->connect_error);

function queryMysql($query)
{
    global $connection;
    $result = $connection->query($query);
    if (!$result) die($connection->error);
    return $result;
}

function destroySession()
{
    $_SESSION = array();

    /*if (session_id() != "" || isset($_COOKIE[session_name()]))
      setcookie(session_name(), '', time()-2592000, '/');

*/
    session_destroy();
}

function sanitizeString($var)
{
    global $connection;
    $var = strip_tags($var);
    $var = htmlentities($var);
    $var = stripslashes($var);
    return $connection->real_escape_string($var);
}

function res($var)
{
    global $connection;
    return $connection->real_escape_string($var);
}

function makeRoomsList($floor, $room)
{
    $floor = isset($floor) ? $floor : 1;
    $room = isset($room) ? $room : 1;
    echo "<div class='panel-group' id='accordion'>";
    $res_floor = queryMysql("Select `ID` FROM `Floor`");
    while ($row_floor = mysqli_fetch_array($res_floor)) {
        if ($row_floor['ID'] == $floor)
            echo "<div class='panel panel-active panel-default'>";
        else
            echo "<div class='panel panel-default'>";
        echo "<div class='panel-heading'>";
        echo "<h4 class='panel-title'>";
        echo "<a data-toggle='collapse' data-parent='#accordion' href='#collapse" . $row_floor['ID'] . "'>Этаж " . $row_floor['ID'] . "</a>";
        echo "</h4>";
        echo "</div>";
        $res_room = queryMysql("Select `ID` From `Room` Where `floor` =" . $row_floor['ID']);
        if ($row_floor['ID'] == $floor)
            echo "<div id='collapse" . $row_floor['ID'] . "' class='panel-collapse collapse in'>";
        else
            echo "<div id='collapse" . $row_floor['ID'] . "' class='panel-collapse collapse'>";
        echo " <div class='list-group'>";
        while ($row_room = mysqli_fetch_array($res_room)) {
            if ($room == $row_room['ID'])
                echo "<a href='" . "index.php?floor=" . $row_floor['ID'] . "&room=" . $row_room['ID'] .
                    "' class='list-group-item active'>Комната " . $row_room['ID'] . "</a>";
            else
                echo "<a href='" . "index.php?floor=" . $row_floor['ID'] . "&room=" . $row_room['ID'] .
                    "' class='list-group-item'>Комната " . $row_room['ID'] . "</a>";
        }
        echo <<<_LIST
                  </div>
            </div>
       </div>
_LIST;
    }
    echo "</div>";
}

function sendMail($to, $from, $title, $mess, $file_name)
{
    $bound = "separator"; // Разделитель, по которому будет отделяться письмо от файла
    $header = "From: $from\n"; // От кого
    $header .= "To: $to\n"; // Кому
    $header .= "Subject: $title\r\n"; // Тема письма
    $header .= "Mime-Version: 1.0\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"$bound\"";

    // Записываем в переменную первую часть письма
    $body = "\n\n--$bound\n";
    $body .= "Content-type: text/html; charset=\"utf-8\"\n";
    $body .= "Content-Transfer-Encoding: quoted-printable\n\n";
    $body .= "$mess";

    $file = fopen($file_name, "rb"); // Открываем отправляемый файл

    // Записываем в переменную вторую часть письма
    $body .= "\n\n--$bound\n";
    $body .= "Content-Type: application/octet-stream;";
    $body .= "name=\"" . basename($file_name) . "\"\n";
    $body .= "Content-Transfer-Encoding:base64\n";
    $body .= "Content-Disposition:attachment\n\n";
    $body .= base64_encode(fread($file, filesize($file_name))) . "\n";
    $body .= "$bound--\n\n";

    // Отправляем
    if (mail($to, $title, $body, $header)) {
        echo "<meta http-equiv = 'refresh' content = '0; url=welcome.php' />";
        echo "<script type = 'text/javascript'>alert('Получилось!')</script>";
    } else {
        echo "<meta http-equiv = 'refresh' content = '0; url=welcome.php' />";
        echo "<script type = 'text/javascript'>alert('Ошибка отправки письма')</script>";
    };

}

/*--------------------------------------------------------------------------------------------*/
function makeFooter()
{
    echo <<<_END
    </div>
    <footer id="footer">
        <hr>
        <p>hostelsystemteam, 2016</p>
    </footer>
    </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src='js/bootstrap-filestyle.js'></script>
</body>
</html>
_END;
}

function makePager($floor)
{
    global $connection;
    $result = $connection->query("SELECT COUNT(ID) FROM floor");
    $max_floor = mysqli_fetch_array($result)['COUNT(ID)'];
    if (!$result) die($connection->error);
    echo <<<_END
<nav>
            <ul class="pager">
_END;
    //check for lower floor. If $floor is lowest - button disabled
    if ($floor - 1 > 0) {
        echo '<li class="previous"><a href="index.php?floor=' . ($floor - 1) . '"><span aria-hidden="true">&larr;</span> Предыдущий этаж</a></li>';
    } else {
        echo '<li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Предыдущий этаж</a></li>';
    }
    //check for higher floor. If $floor is highest - button disabled
    if ($floor + 1 <= $max_floor) {
        echo '<li class="next"><a href="index.php?floor=' . ($floor + 1) . '">Следующий этаж <span aria-hidden="true">&rarr;</span></a></li>';
    } else {
        echo '<li class="next disabled"><a href="#">Следующий этаж <span aria-hidden="true">&rarr;</span></a></li>';
    }
    echo <<<_END
</ul>
        </nav>
_END;

}

?>