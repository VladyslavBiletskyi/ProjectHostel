<?php require_once 'header.php'; ?>
    <div class="col-md-3">
        <?php makeRoomsList()?>
    </div>
    <div class="col-md-9">
        <h3>Этаж 1</h3>
        <ol class="breadcrumb">
            <li>Этаж 1</li>
        </ol>
        <!-- Title -->
        <hr>
        <!-- Preview Image -->
        <img class="img-responsive" src="images\600.png" alt="">
        <nav>
            <ul class="pager">
                <li class="previous disabled"><a href="#"><span aria-hidden="true">&larr;</span> Предыдущий этаж</a></li>
                <li class="next"><a href="#">Следующий этаж <span aria-hidden="true">&rarr;</span></a></li>
            </ul>
        </nav>
    </div>
<?php makeFooter(); ?>