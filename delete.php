<?php  include('inc/header.php'); ?>

<?php 

    if(!(isset($_GET['id']) && is_numeric($_GET['id'])))
        {
            redirect("index");
        }

    $id = $_GET['id'];
    $sql = "SELECT * FROM `users` WHERE id=$id LIMIT 1";
    $result = mysqli_query($db_connect, $sql);
    if(!mysqli_num_rows($result))
        {
            redirect("index");
        }
    $deleteSql = "DELETE FROM `users` WHERE `id` = '$id'";
    mysqli_query($db_connect, $deleteSql);
?>
    <h1 class="text-center col-12 bg-danger py-3 text-white my-2">user has been deleted</h1>
    <?php redirectWait("index", 2)?>

<?php  include('inc/footer.php'); ?>

