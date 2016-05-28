<?php
    require_once 'header.php';
    echo" <div class=\"col-md-3\">";
    echo "   <div id=\"menu\">";
    makeRoomsList($_GET['floor'], $_GET['room']);
    echo "   </div>";
    echo "</div>";
if(!isset($_GET['floor']) && !isset($_GET['room']))
{
    
}
$request = queryMysql("Select * From `Room` Where `ID` = ".$_GET['room']." AND `floor` = ".$_GET['floor']);
$row = mysqli_fetch_array($request);
echo <<<_HTML
<div class="col-md-9">
    <!-- Blog Post -->
    
_HTML;
echo  "<h3>Комната ".$_GET['room']."</h3>";
echo <<<_HTML
    <ol class="breadcrumb">
        <li>
            
_HTML;
echo "<a href=\"index.php?floor=".$_GET['floor']."\">Этаж ".$_GET['floor']."</a>";
echo <<<_HTML
        </li>
        <li class="active">
_HTML;
 echo "          Комната ".$_GET['room'];
echo <<<_HTML
        </li>
    </ol>
    <!-- Title -->

    <hr>

    <!-- Preview Image -->
_HTML;
if (isset($row['img']))
    echo "<img class=\"img-responsive\" src=\"".$row['img']."\" alt=\"\">";
else
    echo "<img class=\"img-responsive\" src=\"images\\300.png\" alt=\"\"> ";
echo <<<_HTML
    <hr>
    
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
if(isset($row['info']))
{
    echo $row['info']."</br>";
}
echo <<<_HTML
    <hr>
    <!-- Blog Comments -->

    <!-- Comments Form -->
    <div class="well">
        <h4>Оставь свой отзыв:</h4>

        <form role="form">
            <div class="form-group">
                <textarea class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    
    <hr>
    
    <!-- Posted Comments -->

    <!-- Comment -->
    <div class="media">
        <a class="pull-left" href="#">
            <img class="media-object" src="images\\64.png" alt="">
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
            <img class="media-object" src="images\\64.png" alt="">
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
                    <img class="media-object" src="images\\64.png" alt="">
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

</div>
_HTML;

makeFooter(); ?>
