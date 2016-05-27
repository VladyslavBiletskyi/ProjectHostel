<?php require_once 'header.php'; ?>
    <div class="col-md-3">
        <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Этаж 1</a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in">
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Комната 101</a></li>
                        <li class="list-group-item"><a href="#">Комната 102</a></li>
                        <li class="list-group-item"><a href="#">Комната 103</a></li>
                        <li class="list-group-item"><a href="#">Комната 104</a></li>
                        <li class="list-group-item"><a href="#">Комната 105</a></li>
                        <li class="list-group-item"><a href="#">Комната 106</a></li>
                    </ul>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">Этаж 2</a>
                    </h4>
                </div>
                <div id="collapseFour" class="panel-collapse collapse">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Комната 201</a>
                        <a href="#" class="list-group-item">Комната 202</a>
                        <a href="#" class="list-group-item">Комната 203</a>
                        <a href="#" class="list-group-item">Комната 204</a>
                        <a href="#" class="list-group-item">Комната 205</a>
                        <a href="#" class="list-group-item">Комната 206</a>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFive">Этаж 3</a>
                    </h4>
                </div>
                <div id="collapseFive" class="panel-collapse collapse">
                    <div class="list-group">
                        <a href="#" class="list-group-item">Комната 301</a>
                        <a href="#" class="list-group-item">Комната 302</a>
                        <a href="#" class="list-group-item">Комната 303</a>
                        <a href="#" class="list-group-item">Комната 304</a>
                        <a href="#" class="list-group-item">Комната 305</a>
                        <a href="#" class="list-group-item">Комната 306</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h3>Этаж 1</h3>
        <ol class="breadcrumb">
            <li>Этаж 1</li>
        </ol>
        <!-- Title -->

        <hr>

        <!-- Preview Image -->
        <img class="img-responsive" src="600.png" alt="">
        <nav>
            <ul class="pager">
                <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Предыдущий этаж</a></li>
                <li class="next"><a href="#">Следующий этаж <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>
<?php makeFooter(); ?>