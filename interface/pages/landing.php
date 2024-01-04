<!-- section1 - hero section -->
<section class="cey-bg-dark lp-s1 d-flex align-items-center">
    <div class="container h-100">
        <div class="w-100 h-100 d-flex gap-3 justify-content-center align-items-center flex-column">
            <div class="d-flex fw-bold gap-2 lp-s1-branding-quotes justify-content-center align-items-center">
                <div class="cey-main-font-light">GRACE</div>
                <div class="lp-s1-dot"></div>
                <div class="cey-main-font-light">DIGNITY</div>
                <div class="lp-s1-dot"></div>
                <div class="cey-main-font-light">IDENTITY</div>
            </div>
            <h1 class="cey-text-white cey-main-font">SEARCH YOUR DREAM SAREE HERE!</h1>
            <div class="lp-s1-searchbar">
                <input class="py-2" type="text" placeholder="search your dream saree....">
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
                <h3 class="cey-main-font-light">NEW ARRAIVAL RELATED TEXT...</h3>
            </div>
            <div class="w-25">
                <h3 class="text-end cey-main-font-light">00:00:00</h3>
            </div>
        </div>
    </div>
</section>

<!-- section 3 - latests -->
<section class="lp-s3 cey-bg-white">
    <div class="container py-3">
        <h3 class="cey-main-font">LATEST COLLECTIONS</h3>
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
                            <div class="content">
                                <h6 class="fw-bold">Porduct Title</h6>
                                <p>product descriptino of small content will be here and it will be very short...</p>
                                <button class="cey-btn-box"><span class="me-3">CART</span> <i class="bi-cart"></i></button>
                            </div>
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
        <h3 class="cey-main-font">LATEST COLLECTIONS</h3>
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

<!-- section 5 - promotion -->
<section class="lp-s5 cey-bg-white">
    <div class="container py-5">
        <h3 class="cey-main-font">PROMOTION</h3>
        <div class="d-flex flex-column flex-md-row w-100">
            <div class="lp-s5-promotion"></div>
            <button class="lp-s5-shop-btn cey-bg-dark cey-text-white">SHOP NOW</button>
        </div>
    </div>
</section>

<!-- section 6 - blogs -->
<section class="lp-s5 cey-bg-dark">
    <div class="container py-5">
        <h3 class="text-white cey-main-font">OUR BLOGS</h3>
        <div class="d-flex flex-column flex-md-row">
            <div style="background-image: url('resources/images/blog1.png');" class="lp-s5-card">
                <h5 class="fw-bold"><a href="#" class="text-white text-decoration-none">Blog Title</a></h5>
                <p>this part consists of small part of the actual blog content and it should not be
                    longer than 2 lines</p>
            </div>
            <div style="background-image: url('resources/images/blog2.png');" class="lp-s5-card">
                <h5 class="fw-bold"><a href="#" class="text-white text-decoration-none">Blog Title</a></h5>
                <p>this part consists of small part of the actual blog content and it should not be
                    longer than 2 lines</p>
            </div>
        </div>
    </div>
</section>

<!-- section 7 - handloom -->
<section class="lp-s7 cey-bg-white">
    <div class="cey-text-white container h-100 d-flex flex-column justify-content-center align-items-center py-5 text-center">
        <h3 class="py-3 cey-main-font">HANDLOOM INDUSTRY</h3>
        <p class="lp-s7-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam in ab mollitia aliquam repudiandae, labore doloribus ipsam nisi ipsa dolores assumenda quae ut recusandae consectetur et dolor error qui velit!</p>
        <button class="cey-btn-box lp-s7-btn">LEARN MORE</button>
    </div>
</section>

<!-- section 8 - our story -->
<section class="lp-s8 cey-bg-white">
    <div class="h-100 d-flex flex-column flex-lg-row">
        <div class="lp-s8-section lp-s8-sides" style="background-image: url('resources/images/ourstory-left.png');"></div>
        <div class="lp-s8-section p-3 lp-s8-middle-box">
            <h3>OUR STORY</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque incidunt labore a tenetur.</p>
            <button class="cey-btn-box cey-main-font">ABOUT US</button>
        </div>
        <div class="lp-s8-section lp-s8-sides" style="background-image: url('resources/images/ourstory-right.png');"></div>
    </div>
</section>


<!-- section 9 - vision mission -->
<?php include(__DIR__ . "/../components/visionmission.php") ?>


<!-- section 10 - testamonials -->
<section class="lp-s10 cey-bg-dark">
    <div class="container py-3">
        <div class="swiper">
            <div class="swiper lptestamonialSwiper">
                <div class="lp-s3-controls w-100 d-flex justify-content-between position-absolute p-3 h-100 align-items-center">
                    <!-- <div class="lp-s3-swiper-control"><i class="lp-s3-swiper-control-left fs-1 cey-text-white bi bi-arrow-left-circle"></i></div> -->
                    <!-- <div class="lp-s3-swiper-control"><i class="lp-s3-swiper-control-right fs-1 cey-text-white bi bi-arrow-right-circle"></i></div> -->
                </div>
                <div class="swiper-wrapper py-5">
                    <?php

                    for ($i = 0; $i < 6; $i++) {
                    ?>
                        <div class="swiper-slide cey-testamonial-card">
                            <h4 class="pb-4">TESTAMONIALS</h4>
                            <p class="text-center">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                            <p class="pt-3">- Miss Sunila Kulathunga</p>

                        </div>
                    <?php
                    }

                    ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
</section>


<!-- section 11 - conatcts  -->
<section class="cey-bg-white lp-s11 p-5">
    <div class="container">
        <h3 class="cey-main-font pb-3">CONATCTS</h3>
        <div class="lp-s11-detail-box gap-3 col-lg-12 col-md-12">
            <div class="d-flex flex-column cey-text-white ls-s11-left-box gap-3 col-lg-6 col-md-6">
                <div class="cey-bg-dark p-1 d-flex align-items-center gap-lg-3 gap-md-3 gap-1">
                    <i class="bi bi-telephone-fill mx-1"></i>
                    <div class="lp-s11-contacts">+94 71 090 2997</div>
                </div>
                <div class="cey-bg-dark p-1 d-flex align-items-center gap-lg-3 gap-md-3 gap-1">
                    <i class="bi bi-envelope-fill mx-1"></i>
                    <div class="lp-s11-contacts">kooplesclothing@gmail.com</div>
                </div>
                <div class="cey-bg-dark p-1 d-flex align-items-center gap-lg-3 gap-md-3 gap-1">
                    <i class="bi bi-geo-alt-fill mx-1"></i>
                    <div class="lp-s11-contacts">No. 14, Charles Father Road, Kandana, Sri Lanka</div>
                </div>
            </div>
            <div class="lp-s11-right-box  cey-bg-dark cey-text-white d-flex flex-column justify-content-center col-lg-6 col-md-6">
                <h6 class="mx-lg-5 mx-sm-3 mx-3 mt-2">FOLLOW US ON</h6>
                <div class="d-flex gap-4 mx-lg-5 mx-sm-3 mx-3">
                    <i class="bi bi-facebook lp-s11-icon"></i>
                    <i class="bi bi-instagram bi-3x lp-s11-icon"></i>
                    <i class="bi bi-linkedin bi-3x lp-s11-icon"></i>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- section 12 - newsletter subscription  -->
<?php include(__DIR__ . "/../components/newsletter.php") ?>