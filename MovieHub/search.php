<?php 

require 'functions.php';
$filmSearch = query("SELECT * FROM film order by description desc");

$genreFilm = ["","Sports","TV Show","Movies","Kids","Anime","Fantasy","Action","Romance"];

if($_GET):
    $filmSearch = query("SELECT * FROM film where title like '%$_GET[title]%' order by description desc");
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
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title"> 
                        <h3>Search results for <div class="orange-text mt-2"><?= $_GET['title'] ?></div></h3>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php foreach ($filmSearch as $key => $value): ?>
                    <div class="col-sm-12">
                        <div class="single-latest-news row">
                            <div class="col-sm-3">
                                <a href="detail.php?id=<?= $value['id'] ?>">
                                    <img class="m-4" src="<?= $value['image'] ?>">
                                </a>
                            </div>
                            <div class="col-sm-8 mb-4">
                                <div class="news-text-box p-1 text-dark">
                                    <p>
                                        <h4 href="detail.php?id=<?= $value['id'] ?>" class="text-light"><?= $value['title'] ?></h4>
                                    </p>
                                    <hr>
                                    <p class="text-light">Genre : <?= $genreFilm[$value['genre']] ?></p><hr>
                                    <p class="text-light">Release Date : <?= $value['release_date'] ?></p><hr>
                                    <p class="text-light">Vote Average : <?= $value['vote_average'] ?></p><hr>
                                    <p class="text-light">Vote Count : <?= $value['vote_count'] ?></p><hr>
                                    <p class="text-light">Description : <?= $value['description'] ?>
                                    
                                </div>
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