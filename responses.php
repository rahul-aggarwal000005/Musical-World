<?php
    $method = $_SERVER['REQUEST_METHOD'];
    if($method == "POST"){
        $name = $_POST['rname'];
        $email = $_POST['remail'];
        $phone_number = $_POST['rphone_number'];
        $message = $_POST['rmessage'];
        include 'partials/_dbconnect.php';
        
        $sql = "INSERT INTO `responses` (`name`, `email`, `phone_number`, `message`, `timestamp`) VALUES ('$name', '$email', '$phone_number', '$message', current_timestamp())";

        $result = mysqli_query($conn,$sql);
        if($result){
            header("location: /dbms/index.php?send=true");
            exit();
        }
    }


?>