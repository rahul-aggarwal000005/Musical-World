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
</head>

<body>

    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_musicheader.php';?>


    <?php
    
        $song_cat = $_GET['cat'];
        echo '<h1 class="text-center text-white mt-3 mb-4"> '.$song_cat.' Songs </h1>';   
            $email = $_SESSION['email'];
            $sql = "SELECT * FROM `users` WHERE user_email = '$email'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $user_id = $row['user_id']; 
    ?>

    <!-- Those files that admin uploads -->


    <div class="container mt-3">
        <div class="row">
            <?php
                $sql = "SELECT * FROM `categories` WHERE category_name='$song_cat'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $category_id = $row['category_id'];
                
                
                
                $sql = "SELECT * FROM `uploads` WHERE category_id = '$category_id'";
                $result = mysqli_query($conn,$sql);
                $noresult = true;
                while($row = mysqli_fetch_assoc($result)){
                    $noresult = false;
                    $song_name = $row['song_name'];
                    $song_path = $row['song_path'];
                    $uploaded_by = $row['user_id'];
                    $song_id = $row['song_path_id'];
                    $path = false;
                    
                    if($uploaded_by == 1){
                        $path = '/dbms/songs/'.$song_cat.'/img/User.jpg';
                        echo'
                            <div class="col-md-4 my-4">
                                <div class="card" style="width:18rem;">
                                    <img src="images/User.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">'.$song_name.' ⭐ </h5>
                                        <audio controls style="width:15rem;">
                                            <source src="'.$song_path.'" type="audio/mpeg">
                                        </audio>
                                    </div>
                        ';

                        if($user_id == 1){
                            echo'
                                <a href="deletesong.php?delete=true&song_id='.$song_id.'&song_path='.$song_path.'" class="d-inline text-danger text-right mr-2 ml-auto" style="font-size: 2em;"> <i class="fas fa-trash-alt"></i> </a>
                            ';
                        }
                        echo'
                                </div>
                            </div>
                        ';
                    }
                    
                    elseif($uploaded_by != $user_id){
                        $path = '/dbms/songs/'.$song_cat.'/img/User.jpg';
                        echo'
                            <div class="col-md-4 my-4">
                                <div class="card" style="width:18rem;">
                                    <img src="images/User.jpg" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">'.$song_name.'</h5>
                                        <audio controls style="width:15rem;">
                                            <source src="'.$song_path.'" type="audio/mpeg">
                                        </audio>
                                    </div>
                        ';
                            
                        if($user_id == 1){
                            echo'
                                <a href="deletesong.php?delete=true&song_id='.$song_id.'&song_path='.$song_path.'" class="d-inline text-danger text-right mr-2 ml-auto" style="font-size: 2em;"> <i class="fas fa-trash-alt"></i> </a>
                            ';
                        }
                        echo'
                            </div>
                        </div>
                        ';
                    }
                    
                }

                if($noresult){
                    echo '
                    <div class="jumbotron w-100 text-center">
                        <h1 class="display-4">No Result Found</h1>
                        <p class="lead">Admin has not uploaded any song yet.</p>
                        <hr class="my-4">
                        <p>Tell Admin to upload some videos here.</p>
                        ';
                    
                    if($user_id == 1){
                        echo '
                        <p>Press the button to add your own song.</p>
                        <a class="btn btn-primary btn-lg" href="/dbms/Music.php" role="button">Add Your Song</a>
                        ';
                    }   
                    echo'    
                    </div>
                    ';
                }
            ?>


        </div>
    </div>

    <?php
        if($user_id != 1){
            echo '
                <div class="container my-3">
                    <h1 class="text-warning my-3"> Your Uploads </h1>
                        <div class="row">
            ';
            
            $sql = "SELECT * FROM `categories` WHERE category_name='$song_cat'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            $category_id = $row['category_id'];
            $sql = "SELECT * FROM `uploads` WHERE category_id = '$category_id' AND user_id = '$user_id'";
            $result = mysqli_query($conn,$sql);
            $noresult = true;
            while($row = mysqli_fetch_assoc($result)){
                $noresult = false;
                $song_name = $row['song_name'];
                $song_path = $row['song_path'];
                $song_id = $row['song_path_id'];
                $path = false;
                
                $path = '/dbms/songs/'.$song_cat.'/img/User.jpg';
            
                echo'
                    <div class="col-md-4 my-4">
                        <div class="card" style="width:18rem;">
                            <img src="images/User.jpg" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-center">'.$song_name.'</h5>
                                <audio controls style="width:15rem;">
                                    <source src="'.$song_path.'" type="audio/mpeg">
                                </audio>
                            </div>
                            <a href="deletesong.php?delete=true&song_id='.$song_id.'&song_path='.$song_path.'" class="d-inline text-danger text-right mr-2 ml-auto" style="font-size: 2em;"> <i class="fas fa-trash-alt"></i> </a>
                        </div>
                    </div>
                ';
            }
            if($noresult){
                echo '
                <div class="jumbotron">
                    <h1 class="display-4">No Result Found</h1>
                    <p class="lead">You have not uploaded any song yet.</p>
                    <hr class="my-4">
                    <p>Press the button to add your own song.</p>
                    <a class="btn btn-primary btn-lg" href="/dbms/Music.php" role="button">Add Your Song</a>
                </div>
                ';
            }
            echo'
                    </div>
                </div>
            ';
        }         
    ?>





    <?php include 'partials/_footer.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>

</body>

</html>