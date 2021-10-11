<?php  include('inc/header.php'); ?>

    <?php 
        //check if request method equal to post or not.
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // check value of name are you equal submit value add_user and is already existed or not.
            if (isset($_POST['update'])){
                //assign value input to variables.
                $name = sanitizeInputString($_POST['name']);
                $email = sanitizeInputEmail($_POST['email']);

                // check all input fields is empty
                if(requiredInput($name) && requiredInput($email)){

                    // check length of name or password;
                    if(minInput($name, 5) || maxInput($password, 20)){

                        // check email is valid
                        if(validateEmail($email)){
                            $id = $_POST['id'];
                            if($password)
                            {
                                $password = sanitizeInputString($_POST['password']);
                                $hashed_pass = password_hash($password, PASSWORD_DEFAULT);
                                $sql = "UPDATE `users` SET `user_name`='$name',`user_email`='$email',`user_password`='$hashed_pass' WHERE `id`='$id'";
                            }else
                            {
                                $sql = "UPDATE `users` SET `user_name`='$name',`user_email`='$email' WHERE `id`='$id'";
                            }

                            $result = mysqli_query($db_connect , $sql);

                            if($result){
                                $success = "Updated Successfully";
                                redirectWait("index", 2);
                            }else{
                                $error = "The update has failed";
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

    <h1 class="text-center col-12 bg-success py-3 text-white my-2">Update User</h1>

    <!-- error message -->
    <?php if($error):?>
        <h5 class="alert alert-danger text-center"><?= $error;?></h5>
        <a href="javascript:history.go(-1)" class="btn btn-primary"><< BACK </a>
    <?php endif;?>

    <!-- success message -->
    <?php if($success):?>
        <h5 class="alert alert-info text-center"><?= $success;?></h5>
    <?php endif;?>

<?php  include('inc/footer.php'); ?>

