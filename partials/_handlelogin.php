<?php
    include '_dbconnect.php';
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "POST"){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $showSuccess = false;
        $showError = false;
    
        
        $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
        $result = mysqli_query($conn,$sql);
        $nums = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        if($nums == 0){
            $showError = "No such User Exist!";
            header("location: /dbms/index.php?login=false&message=$showError");
        }
        elseif(password_verify($password,$row['user_password'])){ 
            $username = $row['user_name'];
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['email'] = $email;
            header("location: /dbms/Music.php");
            exit();
        }
        else{
            $showError = "Wrong Password!";
            header("location: /dbms/index.php?login=false&message=$showError");
        }
        
        // echo $showError."<br>";
        // echo $showSuccess."<br>";
       
    }

?>