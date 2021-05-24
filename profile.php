<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
    <title>Musical World</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="style.css">
    <style>
    html {
        scroll-behavior: smooth;
    }
    </style>
</head>

<body>

    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_musicheader.php';?>

    <?php 
    
        // include 'deleteaccount.php';
        
        $email = $_SESSION['email'];
        $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $username = $row['user_name'];
        $password = $row['user_password'];
        $phone = $row['user_phone_number'];
        $id = $row['user_id'];
        $sql = "SELECT * FROM `uploads` WHERE `user_id` = '$id'";
        $result = mysqli_query($conn,$sql);
        $contribution = mysqli_num_rows($result);


        $method = $_SERVER['REQUEST_METHOD'];
        if($method == "POST"){
            $updated_username = $_POST['username'];
            $updated_phone_number = $_POST['phone'];
        
            $change = false;
            if($username != $updated_username){
                $change = 'updated';
                $sql = "UPDATE `users` SET `user_name` = '$updated_username' WHERE `user_id` = '$id'";
                $result = mysqli_query($conn,$sql);
            }
            
            if($phone != $updated_phone_number){
                $change = 'updated';
                $sql = "UPDATE `users` SET `user_phone_number` = '$updated_phone_number' WHERE `user_id` = '$id'";
                $result = mysqli_query($conn,$sql);
            }
            header("location: /dbms/profile.php?change=$change");
            exit();
        }
        

    ?>

    <?php
        if(isset($_GET['change']) and $_GET['change'] == 'updated'){
            echo'
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Updated!</strong> You have successfully updated your profile.
                    <button type="button" class="close" onclick="profile()" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
        }
    ?>

    <!-- Update -->
    <div class="modal fade" id="editprofile" tabindex="-1" aria-labelledby="editprofileLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editprofileLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/dbms/profile.php" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="<?php echo $username ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number </label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="<?php echo $phone ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                value="<?php echo $password ?>" disabled>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary save">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <div class="container my-5">
        <div class="row my-3 justify-content-center">
            <img src="/dbms/images/user.PNG" alt="">
        </div>
        <?php

            if($username != 'admin'){
                echo'
                    <div class="row justify-content-center mb-5">
                        <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#editprofile">
                            Update
                        </button>
                    </div>
                ';
            }
                    
        ?>


        <div class="row my-5">
            <table class="table table-hover table-dark">
                <tbody>
                    <tr>
                        <th scope="row">Email</th>
                        <td>
                            <?php echo $email ?>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row">Contributions </th>
                        <td colspan="2" class="font-weight-bold"> <?php 
                            if($contribution > 0){
                                echo '+';
                            }
                            echo $contribution;
                        ?></td>
                    </tr>

                    <tr>
                        <th scope="row"> UserName </th>
                        <td> <?php echo $username ?> </td>
                    </tr>

                    <tr>
                        <th scope="row">Phone Number</th>
                        <td><?php echo $phone ?></td>
                    </tr>
                    <?php

                        if($username != 'admin'){
                            echo'
                                <tr>
                                    <th scope="row">Delete Account</th>
                                    <td>
                                        <a href="/dbms/deleteaccount.php">
                                        <button type="button" class="btn btn-outline-danger btn-md "
                                            >
                                            Delete
                                        </button>
                                        </a>
                                    </td>
                                </tr>
                    ';
                    }

                    ?>

                </tbody>
            </table>
        </div>

    </div>



    <?php include 'partials/_footer.php';?>


    <script>
    function render() {
        location.replace("/dbms/deleteaccount.php");
    }
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</body>

</html>

</html>