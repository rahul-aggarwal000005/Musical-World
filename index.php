<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
        integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <title>Music World</title>
    <link rel="stylesheet" href="style.css">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <style>
    html {
        scroll-behavior: smooth;
    }
    </style>
</head>

<body>

    <?php include 'partials/_dbconnect.php';?>
    <?php include 'partials/_header.php';?>

    <?php
        
        if(isset($_GET['deleted'])){
            
            echo'
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>Deleted Successfully!</strong> Your Account has been deleted successfully.
                    <button type="button" class="close" onclick="home()" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
           
        }
        if(isset($_GET['send'])){
            
            echo'
                <div class="alert alert-success alert-dismissible fade show mb-0" role="alert">
                    <strong>Successfully Send!</strong> Thank You for your message. We will respond to you as soon as possible.
                    <button type="button" class="close" onclick="home()" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            ';
            
        }
    
    ?>



    <div class="banner bg-black" id="home">
        <div class="container text-light">
            <h1 class="font-weight-bold text-uppercase"> Listen to the music anywhere. </h1>
            <p class="font-weight-bold mt-3"> Are you a Singer?...</p>
            <p class="font-weight-bold mb-5">Upload Your Music here and get featured.</p>
            <div class="btndiv">
                <a href="/dbms/#about" class="text-white"><button class="btn btn-success classic"> Read More
                    </button></a>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="container-fluid pl-0" id="about">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <div class="box bg-black px-3 py-3 mx-5 border border-white border-3 my-3">
                    <h2 class="text-light text-center mt-2">Musical World </h2>
                    <h2 class="text-light text-center mb-5">GET ADDICTED TO MUSIC</h2>
                    <p class="text-white text-center">
                        Are you a singer?...But afraid to sing in front of a huge crowd.Then you are in the right
                        place.Upload your songs to musical world and let the people listen to your songs and rate it.
                    </p>
                    <p class="text-white text-center">
                        Be the part of musical world.Upload your songs and get featured by greate musicians.
                    </p>
                    <div class="btndiv text-center my-4">
                        <a href="/dbms/#contact" class="text-white"><button class="btn btn-success classic"> Know More
                            </button> </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="images/img-1.jpeg" class="img-fluid" alt="img-1">
            </div>
        </div>
    </div>


    <div class="contact_banner">
        <div class="container">
            <h1 class="text-center my-3 "> For more information</h1>
            <h2 class="text-center my-3">Stay in touch</h2>
            <h5 class="text-center my-3">Musical World a unique platform for upcoming singers.</h5>
        </div>
    </div>


    <div class="contact" id="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2 class="text-white text-center my-5"> <em> Get In Touch </em></h2>
                    <div class="container text-light">
                        <div class="my-5">
                            <h5 class="font-weight-light text-uppercase"> <i class="fas fa-envelope mr-2"></i> Email
                            </h5>
                            <p class="font-weight-bold contact-details"> rahul.aggarwal000005@gmail.com</p>
                        </div>
                        <div class="my-5">
                            <h5 class="font-weight-light text-uppercase"> <i class="fas fa-phone-alt mr-2"></i> Phone
                            </h5>
                            <p class="font-weight-bold contact-details"> +91 9818576300</p>
                        </div>
                        <div class="my-5">
                            <h5 class="font-weight-light text-uppercase "> <i class="fas fa-map-marker-alt mr-2"></i>
                                Address
                            </h5>
                            <p class="font-weight-bold contact-details"> D - 202 Budh Nagar Inderpuri, New Delhi -
                                110012</p>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-white text-center my-5"> <em> Send Us A Mail </em>
                    </h2>
                    <div class="container text-white py-3">
                        <form action="responses.php" method="post">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control bg-dark text-white" name="rname"
                                    placeholder="Name" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control bg-dark text-white" name="remail"
                                    aria-describedby="emailHelp" placeholder="Email" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" class="form-control bg-dark text-white" id="rpn" name="rphone_number"
                                    placeholder="Phone Number" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control bg-dark text-white" name="rmessage" rows="3"
                                    placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-danger mx-auto">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>



    <?php include 'partials/_footer.php';?>









    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js"
        integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous">
    </script>
    <script src="script.js"></script>

</body>

</html>