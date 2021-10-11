<?php include('inc/header.php'); ?>

<?php


//check if request method equal to post or not.
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // check value of name are you equal submit value add_user and is already existed or not.
    if (isset($_POST['add_user'])){
        //assign value input to variables.
        $name = sanitizeInputString($_POST['name']);
        $email = sanitizeInputEmail($_POST['email']);
        $password = sanitizeInputString($_POST['password']);

        // check all input fields is empty
        if(requiredInput($name) && requiredInput($email) && requiredInput($password)){

            // check length of name or password;
            if(minInput($name, 5) || maxInput($password, 20)){

                // check email is valid
                if(validateEmail($email)){
                    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                    
                    $sql = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES ('$name','$email','[$hashed_pass]')";
                    $result = mysqli_query($db_connect , $sql);
                    if($result){
                        $success = "The addition has been completed successfully";
                        redirectWait("index", 2);
                    }else{
                        $error = "The add has failed";
                    }
                }else{
                    $error = "Please Type Valid Email !";
                }

            }else{
                $error = "Name Must Be Grater Than 5 characters | Password Must Be Less Than 20 Characters !";
            }

        }else{
            $error = "Please Fill All Fields !";
        }
    }

}


?>

    <h1 class="text-center col-12 bg-info py-3 text-white my-2">Add New User</h1>

    <!-- error message -->
    <?php if($error):?>
        <h5 class="alert alert-danger text-center"><?= $error;?></h5>
    <?php endif;?>

    <!-- success message -->
    <?php if($success):?>
        <h5 class="alert alert-success text-center"><?= $success;?></h5>
    <?php endif;?>
    <div class="col-md-6 offset-md-3">
        <form class="my-2 p-3 border" action="add.php" method="POST">
            <div class="form-group">
                <label for="exampleInputName1">Full Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1" >
            </div>
            <div class="form-group">
                <label for="exampleInputName1">Email address</label>
                <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
            </div>
        
            <button type="submit" class="btn btn-primary" name="add_user">Submit</button>
        </form>
    </div>

<?php  include('inc/footer.php'); ?>
