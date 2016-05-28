<?php require_once 'header.php';
if (isset($_SESSION['user'])) {

    echo '<div class="col-md-3">';
    if (isset($_GET['floor'])) {
        $floor = sanitizeString($_GET['floor']);

        if (isset($_GET['room'])) {/* floor & room */

            $room = sanitizeString($_GET['room']);

            $query1 = "SELECT * FROM Room WHERE ID='$room'";
            $res = queryMysql($query1);
            if ($res->num_rows > 0) {
                $roominfo = $res->fetch_array()[0];

                makeRoomsList($floor, $room);
                echo "</div><div class='col-md-9'><h3>Room " . $room . "</h3>";
                echo <<<_END
    <ol class="breadcrumb">
        <li>
            <a href="#">Floor 1</a>
        </li>
        <li class="active">
            Room 103
        </li>
    </ol>
_END;
                echo "<hr><!-- Preview Image --><img class='img-responsive' src='" . $roominfo['img'] .
                    "' alt=''><hr>";
                echo <<<_END2
    <!-- Post Content -->
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

    <hr>

    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Leave a Comment:</h4>

        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="images\64.png" alt="">
        </a>

        <div class="media-body">
            <h4 class="media-heading">Comment
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras
            purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
            fringilla. Donec lacinia congue felis in faucibus.
        </div>
    </div>

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="images\64.png" alt="">
        </a>

        <div class="media-body">
            <h4 class="media-heading">Comment
                <small>August 25, 2014 at 9:30 PM</small>
            </h4>
            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras
            purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate
            fringilla. Donec lacinia congue felis in faucibus.
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="images\64.png" alt="">
                </a>

                <div class="media-body">
                    <h4 class="media-heading">Nested comment
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo.
                    Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi
                    vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>
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
                $floorinfo = $res->fetch_array()[0];
                echo " <h3>Этаж " . $floor . "</h3><ol class='breadcrumb'><li>Этаж " . $floor . "</li></ol>";
                echo "<hr><!-- Preview Image -->
<img class='img-responsive' src='".$floorinfo['img']."' alt=''><nav>";

            } else {
                echo "<h4>There isn't such floor in the DB.</h4>";
            }
        }
        makePager($floor);
        echo "</nav></div>";
    } else {

    }
} else {
    echo <<<_END2
<div class="row">
        <div class="col-sm-2">
            <h4>Заявка на регистрацию</h4>
        </div>
        <div class="col-sm-10">
            <form class="form-horizontal" role="form" method="post" action="sendRequest.php"  enctype='multipart/form-data'>
                <!--<div class="form-group">
                    <label for="login" class="col-sm-3 control-label">Ваш логин</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text"
                               required placeholder="Логин"
                               id="login" name="login">
                    </div>
                </div>-->
                <div class="form-group">
                    <label for="fio" class="col-sm-3 control-label">Вашe ФИО</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="text"
                               required placeholder="Фамильева Имя Отчествовна"
                               id="fio" name="fio">
                    </div>
                </div>
                <div class="form-group">
                    <label for="phone" class="col-sm-3 control-label">E-mail</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="email"
                               required placeholder="E-mail"
                               id="email" name="email">
                    </div>
                </div>
                <!--<div class="form-group">
                    <label for="pas" class="col-sm-3 control-label">Пароль</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password"
                               required placeholder="Пароль"
                               id="pas" name="pas">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pas2" class="col-sm-3 control-label">Повторите</label>
                    <div class="col-sm-9">
                        <input class="form-control" type="password"
                               required placeholder="Пароль еще раз"
                               id="pas2" name="pas2">
                    </div>
                </div>
                -->
                <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                <div class="form-group">
                    <label for="pic" class="col-sm-3 control-label">Скан квитанции</label>
                    <div class="col-sm-9">
                        <input type="file"
                               required accept="image/*"
                               id=pic" name="pic">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-success" name="sendreq"><i class="fa fa-share"></i> Отправить заявку</button>
                        <button type="reset" class="btn btn-warning"><i class="fa fa-eraser"></i> Очистить</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
_END2;

}
makeFooter();
die();
?>