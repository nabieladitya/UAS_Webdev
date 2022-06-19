<?php 

require 'functions.php';

$genreFilm = ["","Sports","TV Show","Movies","Kids","Anime","Fantasy","Action","Romance"];

if($_GET):
    $filmSearch = query("SELECT * FROM film where id = '$_GET[id]' ");
    $filmSearch = $filmSearch ? $filmSearch[0] : "";

    $anotherFilm = query("SELECT * FROM film where genre = $filmSearch[genre] and id != $_GET[id]");

else:
    header('Location: ');
endif;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Bootstrap4 Shop Template, Created by Imran Hossain from https://imransdesign.com/">

    <!-- title -->
    <title>Nonton</title>

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
    
    <!-- latest news -->
    <div class="latest-news pt-150 pb-150">
        <div class="container">

            <div class="row">
            </div>

            <div class="row">
                <div class="col-sm-10">
                    <div class="single-latest-news text-center bg-dark shadow-none" style="width: 100%;height: 500px;" >
                    </div>
                    <h3><?= $filmSearch['title'] ?></h3>
                    <br><br>
                    <div class="detail text-light">
                        <p class="text-light">Genre : <?= $genreFilm[$filmSearch['genre']] ?></p>
                        <p class="text-light">Release Date : <?= $filmSearch['release_date'] ?></p>
                        <p class="text-light"> Vote Average : <?= $filmSearch['vote_average'] ?></p>
                        <p class="text-light">Vote Count : <?= $filmSearch['vote_count'] ?></p>
                        <p class="text-light"> Description : <?= $filmSearch['description'] ?></p>
                    </div>
                </div>
                <div class="col-sm-2 row">
                    <div class="col-sm-12 mb-4">
                        <h5>Watch Next</h5>
                    </div>
                    <?php foreach ($anotherFilm as $key => $value): ?>
                        <div class="col-sm-12">
                            <div class="single-latest-news text-center">
                                <a href="detail.php?id=<?= $value['id'] ?>">
                                    <img src="<?= $value['image'] ?>" alt="">
                                </a>
                                <div class="news-text-box p-1 text-light">
                                    <p><a href="single-news.html" class="text-light"><?= $value['title'] ?></a></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
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