<?php


    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project_music";
    
    $conn = mysqli_connect($servername,$username,$password,$database);
    if(!$conn){
        echo "No database found";
    }
    
?>