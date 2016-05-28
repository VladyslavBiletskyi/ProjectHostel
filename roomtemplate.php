<?php require_once 'header.php'; ?>
<div class="col-md-3">
    <div id="menu">
        <!-- Text
        <div class="panel list-group">
            <a href="#" class="list-group-item active" data-toggle="collapse" data-target="#f1" data-parent="#menu">Floor
                1</a>

            <div id="f1" class="sublinks collapse in">
                <a href="#" class="list-group-item">Room 101</a>
                <a href="#" class="list-group-item">Room 102</a>
                <a href="#" class="list-group-item active">Room 103</a>
                <a href="#" class="list-group-item">Room 104</a>
                <a href="#" class="list-group-item">Room 105</a>
                <a href="#" class="list-group-item">Room 106</a>
            </div>
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#f2" data-parent="#menu">Floor 2</a>

            <div id="f2" class="sublinks collapse">
                <a href="#" class="list-group-item">Room 201</a>
                <a href="#" class="list-group-item">Room 202</a>
                <a href="#" class="list-group-item">Room 203</a>
                <a href="#" class="list-group-item">Room 204</a>
                <a href="#" class="list-group-item">Room 205</a>
                <a href="#" class="list-group-item">Room 206</a>
            </div>
            <a href="#" class="list-group-item" data-toggle="collapse" data-target="#f3" data-parent="#menu">Floor 3</a>

            <div id="f3" class="sublinks collapse">
                <a href="#" class="list-group-item">Room 301</a>
                <a href="#" class="list-group-item">Room 302</a>
                <a href="#" class="list-group-item">Room 303</a>
                <a href="#" class="list-group-item">Room 304</a>
                <a href="#" class="list-group-item">Room 305</a>
                <a href="#" class="list-group-item">Room 306</a>
            </div>
        </div>
    </div>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Floor 1</a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse in">
                <ul class="list-group">
                    <li class="list-group-item"><a href="#">Room 101</a></li>
                    <li class="list-group-item"><a href="#">Room 102</a></li>
                    <li class="list-group-item"><a href="#">Room 103</a></li>
                    <li class="list-group-item"><a href="#">Room 104</a></li>
                    <li class="list-group-item"><a href="#">Room 105</a></li>
                    <li class="list-group-item"><a href="#">Room 106</a></li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Floor 2</a>
                </h4>
            </div>
            <div id="collapseFour" class="panel-collapse collapse">
                <div class="list-group">
                    <a href="#" class="list-group-item">Room 201</a>
                    <a href="#" class="list-group-item">Room 202</a>
                    <a href="#" class="list-group-item">Room 203</a>
                    <a href="#" class="list-group-item">Room 204</a>
                    <a href="#" class="list-group-item">Room 205</a>
                    <a href="#" class="list-group-item">Room 206</a>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Floor 3</a>
                </h4>
            </div>
            <div id="collapseFive" class="panel-collapse collapse">
                <div class="list-group">
                    <a href="#" class="list-group-item">Room 301</a>
                    <a href="#" class="list-group-item">Room 302</a>
                    <a href="#" class="list-group-item">Room 303</a>
                    <a href="#" class="list-group-item">Room 304</a>
                    <a href="#" class="list-group-item">Room 305</a>
                    <a href="#" class="list-group-item">Room 306</a>
                </div>
            </div>
        </div> -->
        <?php  makeRoomsList($_GET['floor'], $_GET['room'])  ?>
    </div>
</div>
<div class="col-md-9">
    <!-- Blog Post -->
    <h3>Room 103</h3>
    <ol class="breadcrumb">
        <li>
            <a href="#">Floor 1</a>
        </li>
        <li class="active">
            Room 103
        </li>
    </ol>
    <!-- Title -->

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="images\300.png" alt="">

    <hr>

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

</div>
<?php makeFooter(); ?>
