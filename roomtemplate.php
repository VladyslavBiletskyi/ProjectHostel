<?php
    require_once 'header.php';
addComment();
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

        <form role="form" method="post">
_HTML;
echo "     <input type=\"hidden\" name=\"room\" value=".$_GET['room'].">\n";
echo <<<_HTML
            <div class="form-group">
                <textarea class="form-control" rows="3" name="text"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
    </div>
    
    <hr>
    
    <!-- Posted Comments -->
_HTML;
lookComments($_GET['room']);
makeFooter(); ?>
