<?php

    include 'partials/_dbconnect.php';
    session_start();
    $method = $_SERVER['REQUEST_METHOD'];
    $showSuccess = false;
    if($method == "POST"){
        $category = $_POST['category_name'];
        $song_name = $_POST['song_name'];

        $email = $_SESSION['email'];
        $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['user_id'];

        // if category exist or not defined by the admin
        $sql = "SELECT * FROM `categories` WHERE category_name = '$category'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result) == 0){
            if($user_id != 1){
                header("location: /dbms/Music.php?showsuccess=false&error=no_category");
                exit();
            }
            else{
                $sql = "INSERT INTO `categories` (`category_name`, `user_category_id`, `timestamp`) VALUES ('$category', '$user_id', current_timestamp())"; 
                $result = mysqli_query($conn,$sql);
                mkdir("songs/$category");
            }
        }
        $sql = "SELECT * FROM `categories` WHERE category_name = '$category'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);
        $cat_id = $row['category_id'];
        $dir = 'songs/'.$category.'/';
        $extension = $_FILES['audioFile']['name'];
        
        $song_path = $dir.$song_name.'.mp3';
        if(move_uploaded_file($_FILES['audioFile']['tmp_name'],$song_path)){
            
            // check if this file is already present in the table or not
            $sql = "SELECT * FROM `uploads` WHERE song_path = '$song_path'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                header("location: /dbms/Music.php?showsuccess=false&error=already_exist");
                exit();
            }
            else{
                $email = $_SESSION['email'];
                $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $user_id = $row['user_id'];
                $sql = "INSERT INTO `uploads` (`song_path`,`song_name`,`category_id`,`user_id`) VALUES ('$song_path','$song_name','$cat_id','$user_id')";
                $result = mysqli_query($conn,$sql);
                if($result){
                    header("location: /dbms/Music.php?showsuccess=true");
                    exit();
                }
                else{
                    header("location: /dbms/Music.php?showsuccess=false&error=query");
                    exit();
                }   
            }
        }
    }

?>