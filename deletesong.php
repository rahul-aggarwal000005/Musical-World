<?php

    include 'partials/_dbconnect.php';
    
    $message = false;
    if(isset($_GET['delete']) && $_GET['delete'] == "true"){
        $song_path_id = $_GET['song_id'];
        $song_path = $_GET['song_path'];
                
        // Deleting the song
        $sql = "DELETE FROM `uploads` WHERE `song_path_id` = '$song_path_id'";
        
        
        $result = mysqli_query($conn,$sql);
        if($result){
            if(unlink($song_path)){
                $message = "true";
            }
            else{
                $message = "false";
            }
        }
         
        header("location: /dbms/Music.php?message='$message'");
        exit();
    }
    else{
        header("location: /dbms/Music.php?message=error");
    }
    exit();
?>