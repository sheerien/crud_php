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
    $row = mysqli_fetch_assoc($result);
?>

    <h1 class="text-center col-12 bg-primary py-3 text-white my-2">Edit Info About User</h1>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" action="update.php" method="POST">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" value="<?= $row["user_name"];?>" class="form-control" id="exampleInputName1" >
                <input type="hidden" value="<?= $id;?>" name="id">
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="email" name="email" value="<?= $row["user_email"];?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password"  class="form-control" id="exampleInputPassword1">
            </div>
        
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>

<?php  include('inc/footer.php'); ?>

 
  