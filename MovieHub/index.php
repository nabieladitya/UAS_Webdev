<?php 

require 'functions.php';

$genreFilm = ["","Sports","TV Show","Movies","Kids","Anime","Fantasy","Action","Romance"];

$film10 = query("SELECT * FROM film order by description desc limit 10");
$filmAll = query("SELECT * FROM film order by genre asc");

if($_GET){
    $film10 = query("SELECT * FROM film where genre = $_GET[genre] order by description desc limit 10");
    $filmAll = query("SELECT * FROM film where genre = $_GET[genre] order by genre asc");
}

if(!$filmAll){
    $filmAll = [];
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>MovieHub</title>

    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="assets/img/favicon_mh.ico">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="assets/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="assets/css/animate.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="assets/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="assets/css/responsive.css">

</head>
<body>
    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="index.php">
                                <img src="img/logo_moviehub.png" width="150" height="50">
                            </a>
                        </div>  
                        <!-- logo -->

                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li><a href="index.php?genre=1">Sports</a></li>
                                <li><a href="index.php?genre=2">TV Show</a></li>
                                <li><a href="index.php?genre=3">Movies</a></li>
                                <li><a href="index.php?genre=4">Kids</a></li>
                                <li><a href="#">More</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a href="index.php?genre=5">Anime</a>
                                        </li>
                                        <li>
                                            <a href="index.php?genre=6">Fantasy</a>
                                        </li>
                                        <li>
                                            <a href="index.php?genre=7">Action</a>
                                        </li>
                                        <li>
                                            <a href="index.php?genre=8">Romance</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                <div class="search-box">
                                    <form action=search.php method="get">
                                            <input type="text" name="title" placeholder="Type to search..">
                                            
                                    </form>
                                    <div class="search-icon">
                                        <i class="fas fa-search"></i>
                                    </div>
                                    <div class="cancel-icon">
                                            <i class="fas fa-times"></i>
                                        </div>
                                        <div class="search-data">
                                           
                                    </div>
                                    </div>
                                    <script>
                                        const searchBox = document.querySelector(".search-box");
                                        const searchBtn = document.querySelector(".search-icon");
                                        const cancelBtn = document.querySelector(".cancel-icon");
                                        const searchInput = document.querySelector("input");
                                        const searchData = document.querySelector(".search-data");
                                        searchBtn.onclick =()=>{
                                            searchBox.classList.add("active");
                                            searchBtn.classList.add("active");
                                            searchInput.classList.add("active");
                                            cancelBtn.classList.add("active");
                                            searchInput.focus();
                                           
                                        }
                                        cancelBtn.onclick =()=>{
                                            searchBox.classList.remove("active");
                                            searchBtn.classList.remove("active");
                                            searchInput.classList.remove("active");
                                            cancelBtn.classList.remove("active");
                                            searchData.classList.toggle("active");
                                            searchInput.value = "";
                                        }
                                        </script>

                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->
    

    <!-- logo carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="6"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="7"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="8"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="9"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <a href = "detail.php?id=150">
                <img class="d-block w-100" src="img/1_spyxfam.png" alt="First slide">
                </a>
                
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=162">
                <img class="d-block w-100" src="img/2_aadcinta.png" alt="Second slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=130">
                <img class="d-block w-100" src="img/3_MKnight.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=141">
                <img class="d-block w-100" src="img/4_coach.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=137">
                <img class="d-block w-100" src="img/5_stranger.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=132">
                <img class="d-block w-100" src="img/6_batman.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=134">
                <img class="d-block w-100" src="img/7_dilan.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=133">
                <img class="d-block w-100" src="img/8_tred.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=149">
                <img class="d-block w-100" src="img/9_yourname.png" alt="Third slide">
            </div>
            <div class="carousel-item">
                <a href = "detail.php?id=146">
                <img class="d-block w-100" src="img/10_drstrange.png" alt="Third slide">
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- end logo carousel -->

    <!-- latest news -->
    <div class="latest-news pt-150 pb-150">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title"> 
                        <h3><span class="orange-text">All</span> Movies</h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php $genre = 0 ?>
                <div class="col-sm-12 py-2 my-4">
                    <h4 class="text-white"><?= $filmAll ? $genreFilm[$filmAll[0]['genre']] : "Genre Kosong" ?></h4>
                </div>
                <?php foreach ($filmAll as $key => $value): ?>
                    <?php 
                    if ($genre == 0):
                        $genre = $value['genre'];
                    endif;
                    ?>

                    <?php if($genre != $value['genre']): ?>
                        <div class="col-sm-12 py-2 my-4">
                            <h4 class="text-white"><?= $genreFilm[$value['genre']] ?></h4>
                        </div>
                        <?php $genre = 0 ?>
                    <?php endif; ?>

                    <div class="col-sm-2">
                        <div class="single-latest-news text-center">
                            <a href="detail.php?id=<?= $value['id'] ?>">
                                <img src="<?= $value['image'] ?>" alt="">
                            </a>
                            <div class="news-text-box p-1 text-white">
                                <p><a href="single-news.html" class="text-white"><?= $value['title'] ?></a></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </div>
    <!-- end latest news -->

    <!-- jquery -->
    <script src="assets/js/jquery-1.11.3.min.js"></script>
    <!-- bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <!-- count down -->
    <script src="assets/js/jquery.countdown.js"></script>
    <!-- isotope -->
    <script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
    <!-- waypoints -->
    <script src="assets/js/waypoints.js"></script>
    <!-- owl carousel -->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- mean menu -->
    <script src="assets/js/jquery.meanmenu.min.js"></script>
    <!-- sticker js -->
    <script src="assets/js/sticker.js"></script>
    <!-- main js -->
    <script src="assets/js/main.js"></script>

</body>
</html>