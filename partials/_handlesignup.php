<?php
    include '_dbconnect.php';
    echo "hello";
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "POST"){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        
        $showSuccess = false;
        $showError = false;
        
        if(strlen($phone) != 10){
            $showError = "Phone Number must be of 10 digits";
        }
        elseif(!ctype_digit($phone)){
            $showError = "Phone Number should only contain digits";
        }
        elseif ($password != $cpassword) {
            $showError = "Password Donot match";
        }
        
        $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);
        if($nums > 0){
            $showError = "User Already Exist";
        }
        else{
            $hash = password_hash($password,PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`user_name`, `user_email`, `user_password`, `user_phone_number`, `timestamp`) VALUES ('$username', '$email', '$hash', '$phone', current_timestamp());";
            $result = mysqli_query($conn,$sql);
            if($result){
                $showSuccess = "You have been Successfull Signed Up. Please Login";
            }
            else{
                $showError = "There is some technical Issue. Sorry for the inconvenience ".mysqli_error($conn);
            }
        }
        if($showError){
            header("location: /dbms/index.php?signup=false&message=$showError");
        }
        else{
            header("location: /dbms/index.php?signup=true&message=$showSuccess");
        }
        // echo $showError."<br>";
        // echo $showSuccess."<br>";
       
    }

?>