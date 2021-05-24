<?php

    include 'partials/_dbconnect.php';    
    session_start();
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $hash= $row['user_password'];
    $user_id = $row['user_id'];
    
    
    $sql = "DELETE FROM `uploads` WHERE `user_id` = $user_id";
    $result = mysqli_query($conn,$sql);
    
    $sql = "DELETE FROM `users` WHERE `user_id` = '$user_id'";
    $result = mysqli_query($conn,$sql);
    
    
    session_start();
    // echo "logging you out please wait....";
    session_destroy();
    
    header("location: /dbms/index.php?deleted=true");
    exit();    
?>