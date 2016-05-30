<?php require_once 'header.php';
bookRoom();
if (isset($_SESSION['login']) || isset($_SESSION['email'])) {
    echo '<div class="col-md-3">';
    $_GET['floor'] = isset($_GET['floor']) ? $_GET['floor'] : 1;
    if (isset($_GET['floor'])) {

        $floor = sanitizeString($_GET['floor']);

        if (isset($_GET['room'])) {/* floor & room */
            bookRoom();
            $room = sanitizeString($_GET['room']);

            if (isset($_POST['text'])) {

                $_SESSION['text'] = $_POST['text'];
                $_SESSION['room'] = $_POST['room'];
                echo "<meta http-equiv='Refresh' content='0; URL='index.php?floor=" . $floor . "&room=" . $room . "'>";
                makeFooter();
                die();
            } else if (isset($_SESSION['text'])) {

                $cpost = sanitizeString($_SESSION['text']);
                if ($cpost!='') {
                    $croom = sanitizeString($_SESSION['room']);
                    $curdate = date("Y-m-d H:i:s");
                    $query3 = "INSERT INTO Comment(ID,text, user, time, room, pre_comment)
                VALUES (NULL,'$cpost',(SELECT Id FROM User WHERE eMail = '" . $_SESSION['email'] . "'),'$curdate',$croom, NULL)";
                    queryMysql($query3);
                }
                $_POST = array();
                unset($_SESSION['text']);
                unset($_SESSION['room']);
            }

            $query1 = "SELECT * FROM Room WHERE ID='$room'";
            $res = queryMysql($query1);
            if ($res->num_rows > 0) {
                $roomimg = $res->fetch_array()['img'];

                makeRoomsList($floor, $room);
                echo <<<_HTML
</div><div class="col-md-9">
    <!-- Blog Post -->

_HTML;
                echo "<h3>Комната " . $room . "</h3>";
                echo "<ol class='breadcrumb'><li>
                    <a href='index.php?floor=" . $floor . "'>Этаж " . $floor . "</a></li>
                    <li class='active'>Комната " . $room . "</li></ol>";
                if ($_SESSION['living_room'] == null) {
                echo " <form role=\"form\" method=\"post\">";
                    echo "<input type=\"hidden\" name=\"book_room\" value=".$_GET['room'].">\n";
                    echo "<button type=\"submit\" class=\"btn btn-success\">Залеситься</button>";
                }
                echo "<hr><!-- Preview Image --><img class='img-responsive' src='" . $roomimg . "' alt=''><hr>";
                echo <<<_HTML
    <!-- Post Content
        <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam
        sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus
        inventore?</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, tenetur natus doloremque laborum quos iste ipsum
        rerum obcaecati impedit odit illo dolorum ab tempora nihil dicta earum fugiat. Temporibus, voluptatibus.</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis unde eius
        illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat perspiciatis. Enim, iure!</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, nostrum, aliquid, animi, ut quas placeat totam
        sunt tempora commodi nihil ullam alias modi dicta saepe minima ab quo voluptatem obcaecati?</p>

    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Harum, dolor quis. Sunt, ut, explicabo, aliquam tenetur
        ratione tempore quidem voluptates cupiditate voluptas illo saepe quaerat numquam recusandae? Qui,
        necessitatibus, est!</p>
-->

_HTML;
                lookComments($room);
                echo <<<_END2
                <hr>
    <!-- Comments Form -->
    <div class="well">
        <h4>Оставь свой отзыв:</h4>

        <form role="form" method="post">
_END2;
                echo "<input type='hidden' name='room' value=" . $room . ">";
                echo <<<_END2
            <div class="form-group">
                <textarea class="form-control" rows="3" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    <hr>
_END2;

            } else {
                echo "</div><div class='col-md-9'><h4>There isn't such room in the DB.</h4>";
            }
        } else {/* only floor */

            makeRoomsList($floor, 0);
            echo '</div> <div class="col-md-9">';
            $query1 = "SELECT * FROM Floor WHERE ID='$floor'";
            $res = queryMysql($query1);
            if ($res->num_rows > 0) {
                $floorimg = $res->fetch_array()['img'];

                echo " <h3>Этаж " . $floor . "</h3><ol class='breadcrumb'><li>Этаж " . $floor . "</li></ol>";
                echo "<hr><!-- Preview Image --><img class='img-responsive' src='" . $floorimg . "' alt=''><nav>";

            } else {
                echo "<h4>There isn't such floor in the DB.</h4>";
            }
        }
        makePager($floor);
        echo "</nav></div>";
    } else {/*just index without any GET*/
        echo "<h5>Place some code here</h5>";
    }
} else {/*not authorized*/
    echo '<meta http-equiv="Refresh" content="0; URL=welcome.php">';
    //header( 'Refresh: 0; url=welcome.php');
}
makeFooter();
die();
?>