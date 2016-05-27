<?php require_once 'header.php';
if(isset($_SESSION['user'])){
    $id = $result = "";
    if (isset($_GET['id'])) {
        $id = sanitizeString($_GET['id']);
        $query1 = "SELECT * FROM floor WHERE floor_id='$id'";
        $res = queryMysql($query1);
        if ($res->num_rows > 0) {
            foreach ($res as $row) {
                /*echo*/
            }
        } else {
            echo "<h4>There isn't such floor in the DB.</h4>";
        }
    } else {
        $query = "SELECT * FROM floor";
        $res = queryMysql($query);
        if ($res->num_rows > 0) {
            foreach ($res as $row) {
                /*echo*/
            }
        } else {
            echo '<h4>There are no floors in the DB.</h4>';
        }
    }
} else {
    //redirect to login page
    //code below is wrong
    //echo '<meta http-equiv="Refresh" content="0; URL=index.php">';
}
makeFooter();
die();
?>