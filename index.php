<?php require_once 'header.php'; ?>
    <div class="col-md-3">
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
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h3>Floor 1</h3>
        <ol class="breadcrumb">
            <li>Floor 1</li>
        </ol>
        <!-- Title -->

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="600.png" alt="">
        <nav>
            <ul class="pager">
                <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Previous floor</a></li>
                <li class="next"><a href="#">Next floor <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>
<?php makeFooter(); ?>