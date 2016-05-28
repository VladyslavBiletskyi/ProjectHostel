<?php require_once 'header.php'; ?>
    <div class="col-md-3">
        <?php makeRoomsList(1, 0)?>
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
         <?php makePager(1); ?>
    </div>
<?php makeFooter(); ?>