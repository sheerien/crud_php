<?php  include('inc/header.php'); ?>
<?php 
$sql = "SELECT * FROM `users`";
$result = mysqli_query($db_connect, $sql);

?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Home Page</h1>
    <div class="row">
        <div class="col-sm-12">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Edit</th>
                    <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(mysqli_num_rows($result) > 0): ?>
                        <?php while($row = mysqli_fetch_assoc($result)):?>
                            <tr>
                                <th><?= $row['id']?></th>
                                <td><?=$row['user_name']?></td>
                                <td><?=$row['user_email']?></td>
                                <td>
                                    <a class="btn btn-info" href="edit.php?id=<?= $row['id']?>"> <i class="fa fa-edit"></i> </a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="delete.php?id=<?= $row['id']?>"> <i class="fa fa-close"></i> </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

<?php  include('inc/footer.php'); ?>

 
  