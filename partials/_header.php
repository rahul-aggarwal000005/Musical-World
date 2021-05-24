<?php

session_start();

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
                <a class="nav-link" href="/dbms/#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dbms/#about">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/dbms/#contact">Contact</a>
            </li>
        </ul>';
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
echo'
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-success my-2 my-sm-0 mr-2" type="submit">Search</button>
            <button type="button" class="btn btn-outline-success mr-2" data-toggle="modal" data-target="#login">
                login
            </button>
            <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#signup">
                Sign Up
            </button>
        </form>
    </div>
</nav>
';
}
else{
    header("location: /dbms/Music.php");
}
?>






<?php include '_signupmodal.php'; 
if(isset($_GET['signup'])){
    if($_GET['signup'] == 'false'){
        echo '
            <div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
                <strong>Error!</strong> '.$_GET['message'].'.
                <button type="button" class="close" onclick="home()" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ';
    }
    else{
        echo'
            <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                <strong>Success!</strong>'.$_GET['message'].'.
                <button type="button" class="close" onclick="home()" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        ';
    }
}

?>
<?php include '_loginmodal.php' ?>