<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEY004 - Kooples Web Applcation</title>

    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">

    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.large.css">
    <link rel="stylesheet" href="css/style.medium.css">
    <link rel="stylesheet" href="css/style.small.css">

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/main.js"></script>
    <script defer src="js/landing.js"></script>
</head>

<body>

    <!-- header -->
    <?php
    include("interface/components/header.php");
    ?>

    <!-- section1 - hero section -->
    <section class="cey-bg-dark lp-s1 d-flex align-items-center">
        <div class="container h-100">
            <div class="w-100 h-100 d-flex gap-3 justify-content-center align-items-center flex-column">
                <div class="d-flex fw-bold gap-2 lp-s1-branding-quotes justify-content-center align-items-center">
                    <div>GRACE</div>
                    <div class="lp-s1-dot"></div>
                    <div>DIGNITY</div>
                    <div class="lp-s1-dot"></div>
                    <div>IDENTITY</div>
                </div>
                <h1 class="cey-text-white">FIRST HEADING GOES HERE</h1>
                <div class="lp-s1-searchbar">
                    <input type="text" placeholder="search your dream saree....">
                    <i class="fs-2 bi bi-search"></i>
                </div>
            </div>
        </div>
    </section>

    <!-- section2 - new product countdown section -->
    <section class="lp-s2 cey-bg-darker">
        <div class="container h-100">
            <div class="w-100 h-100 py-3 d-flex justify-content-between align-items-center">
                <div class="w-75">
                    <h3>NEW ARRAIVAL RELATED TEXT...</h3>
                </div>
                <div class="w-25">
                    <h3 class="text-end">00:00:00</h3>
                </div>
            </div>
        </div>
    </section>

    <!-- section 3 - latests -->
    <section class="lp-s3 cey-bg-white">
        <div class="container py-3">
            <h3>LATEST COLLECTIONS</h3>
            <div class="swiper">
                <div class="swiper lpLatestProductSwiper">
                    <div class="lp-s3-controls w-100 d-flex justify-content-between position-absolute p-3 h-100 align-items-center">
                        <div class="lp-s3-swiper-control"><i class="lp-s3-swiper-control-left fs-1 cey-text-white bi bi-arrow-left-circle"></i></div>
                        <div class="lp-s3-swiper-control"><i class="lp-s3-swiper-control-right fs-1 cey-text-white bi bi-arrow-right-circle"></i></div>
                    </div>
                    <div class="swiper-wrapper py-5">
                        <?php

                        for ($i = 0; $i < 6; $i++) {
                        ?>
                            <div class="swiper-slide cey-product-item-card cey-shadow-light">
                                <img src="resources/images/hero.jpg" height="100%" width="100%">
                                <h6 class="fw-bold">Porduct Title</h6>
                                <p>product descriptino of small content will be here and it will be very short...</p>
                                <button class="cey-btn-box"><span class="me-3">CART</span> <i class="bi-cart"></i></button>
                            </div>
                        <?php
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section 4 - categories -->
    <section class="lp-s4 cey-bg-dark">
        <div class="container py-5">
            <h3>LATEST COLLECTIONS</h3>
            <div class="d-flex flex-column">
                <div class="d-flex flex-wrap">
                    <div class="p-4 col-md-6 lp-s4-card d-flex align-items-end col-12 lp-s4-large-card" style="background-image: url('resources/images/category1.jpg');">
                        <div class="d-flex flex-column">
                            <h4 class="fw-bold cey-text-white">CATEGORY 1</h4>
                            <p class="cey-text-white">EXPLORE -></p>
                        </div>
                    </div>
                    <div class="p-4 col-md-6 lp-s4-card d-flex align-items-end col-12 lp-s4-large-card" style="background-image: url('resources/images/category2.jpg');">
                        <div class="d-flex flex-column">
                            <h4 class="fw-bold cey-text-white">CATEGORY 1</h4>
                            <p class="cey-text-white">EXPLORE -></p>
                        </div>
                    </div>
                </div>
                <div class="d-flex flex-wrap">
                    <div class="col-6 col-md-3 lp-s4-card d-flex align-items-end p-4 lp-s4-small-card" style="background-image: url('resources/images/category3.jpg');">
                        <div class="d-flex flex-column">
                            <h4 class="fw-bold cey-text-white">CATEGORY 1</h4>
                            <p class="cey-text-white">EXPLORE -></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 lp-s4-card d-flex align-items-end p-4 lp-s4-small-card" style="background-image: url('resources/images/category4.jpg');">
                        <div class="d-flex flex-column">
                            <h4 class="fw-bold cey-text-white">CATEGORY 1</h4>
                            <p class="cey-text-white">EXPLORE -></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 lp-s4-card d-flex align-items-end p-4 lp-s4-small-card" style="background-image: url('resources/images/category5.jpg');">
                        <div class="d-flex flex-column">
                            <h4 class="fw-bold cey-text-white">CATEGORY 1</h4>
                            <p class="cey-text-white">EXPLORE -></p>
                        </div>
                    </div>
                    <div class="col-6 col-md-3 lp-s4-card d-flex align-items-end p-4 lp-s4-small-card" style="background-image: url('resources/images/category6.jpg');">
                        <div class="d-flex flex-column">
                            <h4 class="fw-bold cey-text-white">CATEGORY 1</h4>
                            <p class="cey-text-white">EXPLORE -></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
                        
    <!--  footer -->
    <?php
    include("interface/components/footer.php");
    ?>

</body>

</html>