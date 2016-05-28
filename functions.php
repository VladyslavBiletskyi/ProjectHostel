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

function makeRoomsList()
{

    $res_floor = queryMysql("Select `ID` FROM `Floor`");
    while ($row = mysqli_fetch_array($res_floor)) {
        echo "       <div class=\"panel panel-default\">\n";
        echo "      <div class=\"panel-heading\">\n";
        echo "                   <h4 class=\"panel-title\">\n";
        echo "                      <a data-toggle=\"collapse\" data-parent=\"#accordion\" href=\"#collapse".$row['ID']."\">Этаж " . $row['ID']."</a>\n";
        echo "                   </h4>\n";
        echo "               </div>\n";
        $res_room = queryMysql("Select `ID` From `Room` Where `floor` =" .$row['ID']);
        echo "        <div id=\"collapse".$row['ID']."\" class=\"panel-collapse collapse\">\n";
        echo '                   <div class="list-group">'."\n";
        while ($row_room = mysqli_fetch_array($res_room)) {
            echo '<a href="'."roomtemplate.php?id=".$row_room['ID'].'" class="list-group-item">Комната '. $row_room['ID']. '</a>'."\n";
        }
 echo <<<_LIST
                  </div>
            </div>
       </div>
_LIST;
    }

}
function sendMail($to, $from, $title, $mess, $file_name)
{
    $bound = "separator"; // Разделитель, по которому будет отделяться письмо от файла
    $header="From: $from\n"; // От кого
    $header.="To: $to\n"; // Кому
    $header.="Subject: $title\r\n"; // Тема письма
    $header.="Mime-Version: 1.0\n";
    $header.="Content-Type: multipart/mixed; boundary=\"$bound\"";

    // Записываем в переменную первую часть письма
    $body="\n\n--$bound\n";
    $body.="Content-type: text/html; charset=\"utf-8\"\n";
    $body.="Content-Transfer-Encoding: quoted-printable\n\n";
    $body.="$mess";

    $file=fopen($file_name,"rb"); // Открываем отправляемый файл

    // Записываем в переменную вторую часть письма
    $body.="\n\n--$bound\n";
    $body.="Content-Type: application/octet-stream;";
    $body.="name=\"".basename($file_name)."\"\n";
    $body.="Content-Transfer-Encoding:base64\n";
    $body.="Content-Disposition:attachment\n\n";
    $body.=base64_encode(fread($file,filesize($file_name)))."\n";
    $body.="$bound--\n\n";

    // Отправляем
    if(mail($to, $title, $body, $header))
    {
        echo "<script type = 'text/javascript'>alert('Получилось!')</script>";
    }
    else
    {
        echo "<script type = 'text/javascript'>alert('Ошибка отправки письма')</script>";
    };
    echo "<meta http-equiv = 'refresh' content = '0; url=welcome.php' />";
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
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
</body>
</html>
_END;
}

?>