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

    <!-- adding song -->
    <?php
        if(isset($_GET['showsuccess'])){
           if($_GET['showsuccess'] == 'true'){
                echo'
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success !</strong> You have uploaded the song.
                        <button type="button" class="close" onclick="musichome()" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
           }
           elseif($_GET['showsuccess'] == 'false' && $_GET['error'] == 'aready_exist'){
                echo'
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Failure !</strong> Song Already present.
                        <button type="button" class="close" onclick="musichome()" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
           }
           else{
                echo'
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Failure !</strong> No Such Category Found.
                        <button type="button" class="close" onclick="musichome()" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
           }
        }
        
    ?>

    <?php
        if(isset($_GET['message'])){
           if($_GET['message'] == true){
                echo'
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Success !</strong> You have deleted the song.
                        <button type="button" class="close" onclick="musichome()" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
           }
          
           else{
                echo'
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Failure !</strong> Technical Fault.
                        <button type="button" class="close" onclick="musichome()" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                ';
           }
        }
        
    ?>



    <h1 class="text-center text-warning font-weight-bold my-3"> Categories </h1>
    <div class="container">
        <div class="row my-5">
            <?php 
            
                $noresult = true;
                
                // SQL Query
                $sql = "SELECT * FROM `categories`";
                
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){
                    $category_name = $row['category_name'];
                    $category_id = $row['category_id'];
                    $noresult = false;
                    $display = substr($category_name,0,1);
                    echo'
                        <div class="col-md-3 my-3">
                            <div class="card" style="width: 14rem;">
                                <a href="song.php?cat='.$category_name.'" class="text-white">    
                                    <img src="images/cat-logo.jpg" class="card-img-top rounded"
                                        alt="trial">
                                    <div class="card-body bg-danger">
                                        <h5 class="card-title text-center">'. $category_name.'</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    ';
                }
            ?>


        </div>
        <div class="row my-5">
            <div class="container text-white">
                <h2 class="text-success text-center font-weight-bold"> Add Your Own Songs </h2>
                <div class="row">
                    <div class="col-md-6 py-3">
                        <form action="upload.php" class="px-4 py-4 border border-2 border-white" method="post"
                            enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="Category">Category Name</label>
                                <input type="text" class="form-control bg-dark text-white" id="Category"
                                    name="category_name">
                            </div>
                            <div class="form-group">
                                <label for="song_name">Song Name</label>
                                <input type="text" class="form-control bg-dark text-white" id="Song name"
                                    name="song_name">
                            </div>
                            <div class="form-group">
                                <label for="song_name">Upload the Song </label>
                                <input type="file" class="form-control-file" id="song_name" name="audioFile">
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    </div>
                    <div class="col-mdd-6 py-3">
                        <img src="/dbms/images/img-3.jpeg" class="rounded ml-5" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>



    <?php include 'partials/_footer.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>

</html>