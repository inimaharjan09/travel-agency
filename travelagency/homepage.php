<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>
<html>

<head>
    <title>Travel Agency System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Travel Agency</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Tour package</a>
                </li>
                <?php echo $_SESSION['user_name']; die;?>
                <?php  if(!isset($_SESSION['user_name'])){ ?>
                <li class="nav-item">
                    <a class="nav-link" href="login_form.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="register_form.php">Signup</a>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/la.jpg" alt="Los Angeles" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Los Angeles</h3>
                    <p>We had such a great time in LA!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/10.jpg" alt="Chicago" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Travel</h3>
                    <p>Thank you, travel!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="images/11.jpg" alt="New York" width="1100" height="500">
                <div class="carousel-caption">
                    <h3>Place</h3>
                    <p>We love travelling!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    <section class="my-5">
        <div>
            <h3 class="text-center">Tour package information</h3>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/Dubai.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Dubai :)</h4>
                            <p class="card-text">3 NIGHTS | 4 DAYS NPR 50000</p>
                            <a href="#" class="btn btn-primary">View Deal</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/la.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Los Angeles :)</h4>
                            <p class="card-text">5 NIGHTS | 6 DAYS NPR 60000</p>
                            <a href="#" class="btn btn-primary">View Deal</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/Th.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Thailand :)</h4>
                            <p class="card-text">6 NIGHTS | 7 DAYS NPR 20000</p>
                            <a href="#" class="btn btn-primary">View Deal</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/Maldives.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Maldives :)</h4>
                            <p class="card-text">3 NIGHTS | 4 DAYS NPR 45000</p>
                            <a href="#" class="btn btn-primary">View Deal</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/singapore.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Singapore :)</h4>
                            <p class="card-text">4 NIGHTS | 5 DAYS NPR 55000</p>
                            <a href="#" class="btn btn-primary">View Deal</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="card">
                        <img class="card-img-top" src="images/abc.jpg" alt="Card image">
                        <div class="card-body">
                            <h4 class="card-title">Australlia :)</h4>
                            <p class="card-text">4 NIGHTS | 5 DAYS NPR 55000</p>
                            <a href="#" class="btn btn-primary">View Deal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="w3-container">
        <footer class="bg-dark text-center text-white">
            <div class="w3-container">
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                    © 2020 Copyright: Travels. All rights reserved
                </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>