<?php
include '_dbconnect.php';
session_start();

if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    $email = $_SESSION['email'];
    $sql = "SELECT * FROM `users` WHERE `user_email` = '$email'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $username = $row['user_name'];
echo'
<nav class="navbar navbar-expand-lg navbar-dark bg-dark py-3">
    <a class="navbar-brand" href="/dbms/">Musical World</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/dbms/Music.php">Categories <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dbms/profile.php">Profile</a>
            </li>
            <li class="nav-item">
                <h5 class="nav-link mb-0 text-warning"><i class=" mx-2 fas fa-user text-warning"></i>'.$username.' </h5>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0 mr-2" type="submit">Search</button>
            <a href="partials/_logout.php" type="button" class="btn btn-danger">
                log out
            </a>
        </form>
    </div>
</nav>
';
}
else{
    header("location: /dbms/index.php");
}
?>