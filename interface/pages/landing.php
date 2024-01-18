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
                <input id="heroSearch" class="py-2" type="text" placeholder="search your dream saree....">
                <button class="bg-transparent border-0 cey-text-white"><i onclick="heroSearch()" class="fs-2 bi bi-search"></i></button>
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
<section class="lp-s3 cey-bg-white" id="latestCollectionSection">
    <div class="container py-3">
        <h3 class="cey-main-font">LATEST COLLECTIONS</h3>
        <div class="swiper">
            <div class="swiper lpLatestProductSwiper">
                <div class="lp-s3-controls w-100 d-flex justify-content-between position-absolute p-3 h-100 align-items-center">
                    <div class="lp-s3-swiper-control"><i class="lp-s3-swiper-control-left fs-1 cey-text-white bi bi-arrow-left-circle"></i></div>
                    <div class="lp-s3-swiper-control"><i class="lp-s3-swiper-control-right fs-1 cey-text-white bi bi-arrow-right-circle"></i></div>
                </div>
                <div class="swiper-wrapper py-5" id="latestCollectionContainer">
                    <!-- latest collection will load here -->
                </div>
            </div>
        </div>
    </div>
</section>

<!-- section 4 - categories -->
<section class="lp-s4 cey-bg-dark">
    <div class="container py-5">
        <h3 class="cey-main-font">CATEGORIES</h3>
        <div class="d-flex flex-column">
            <div class="d-flex flex-wrap">
                <div onclick="toPage('/shop?category=Rayon Collection')" class="p-4 col-md-4 lp-s4-card d-flex align-items-end col-12 lp-s4-large-card" style="background-image: url('resources/images/category1.jpg');">
                    <div class="d-flex flex-column">
                        <h4 class="fw-bold cey-text-white">Rayon</h4>
                        <p class="cey-text-white">EXPLORE -></p>
                    </div>
                </div>
                <div onclick="toPage('/shop?category=Cotton Collection')" class="p-4 col-md-4 lp-s4-card d-flex align-items-end col-12 lp-s4-large-card" style="background-image: url('resources/images/category2.jpg');">
                    <div class="d-flex flex-column">
                        <h4 class="fw-bold cey-text-white">Cotton</h4>
                        <p class="cey-text-white">EXPLORE -></p>
                    </div>
                </div>
            </div>
            <!-- <div class="d-flex flex-wrap">
                <div onclick="toPage('/shop?category=category 3')" class="col-6 col-md-3 lp-s4-card d-flex align-items-end p-4 lp-s4-small-card" style="background-image: url('resources/images/category3.jpg');">
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
            </div> -->
        </div>
    </div>
</section>

<!-- section 5 - promotion -->
<!-- <section class="lp-s5 cey-bg-white">
    <div class="container py-5">
        <h3 class="cey-main-font">PROMOTION</h3>
        <div class="d-flex flex-column flex-md-row w-100">
            <div class="lp-s5-promotion"></div>
            <button class="lp-s5-shop-btn cey-bg-dark cey-text-white">SHOP NOW</button>
        </div>
    </div>
</section> -->

<!-- section 6 - blogs -->
<!-- <section class="lp-s5 cey-bg-dark">
    <div class="container py-5">
        <h3 class="text-white cey-main-font">OUR BLOGS</h3>
        <div class="d-flex flex-column flex-md-row">
            <div style="background-image: url('resources/images/blog1.jpg');" class="lp-s5-card">
                <h5 class="fw-bold"><a href="#" class="text-white text-decoration-none">Blog Title</a></h5>
                <p>this part consists of small part of the actual blog content and it should not be
                    longer than 2 lines</p>
            </div>
            <div style="background-image: url('resources/images/blog2.jpg');" class="lp-s5-card">
                <h5 class="fw-bold"><a href="#" class="text-white text-decoration-none">Blog Title</a></h5>
                <p>this part consists of small part of the actual blog content and it should not be
                    longer than 2 lines</p>
            </div>
        </div>
    </div>
</section> -->

<!-- section 7 - handloom -->
<section class="lp-s7 cey-bg-white">
    <div class="cey-text-white container h-100 d-flex flex-column justify-content-center align-items-center py-5 text-center">
        <h3 class="py-3 cey-main-font">HANDLOOM INDUSTRY</h3>
        <p class="lp-s7-description">The Sri Lankan handloom industry is a vibrant sector that has a historical connection to handlooms, with records of the country trading vividly designed cotton textiles with India and China as far as 1000 years ago1. Today, it is primarily a cottage industry, with a few large manufacturers leading the way</p>
        <button class="cey-btn-box lp-s7-btn">LEARN MORE</button>
    </div>
</section>

<!-- section 8 - our story -->
<section class="lp-s8 cey-bg-white">
    <div class="h-100 d-flex flex-column flex-lg-row">
        <div class="lp-s8-section lp-s8-sides" style="background-image: url('resources/images/ourstory-left.jpg');"></div>
        <div class="lp-s8-section p-3 lp-s8-middle-box">
            <h3>OUR STORY</h3>
            <p>KOOPLES was born from my personal fascination with the captivating art of handloom saree crafting. I was inspired to create a brand that offers all the beautiful ladies the same magical experience I had when I first laid eyes on these excellent fabrics. Now, through KOOPLES, we bring you handpicked creations that celebrate the artistry of skilled artisans, ensuring you feel the same mesmerizing allure with each fold.
            </p>
            <button class="cey-btn-box cey-main-font">ABOUT US</button>
        </div>
        <div class="lp-s8-section lp-s8-sides" style="background-image: url('resources/images/ourstory-right.jpg');"></div>
    </div>
</section>

<!-- section 3 - Video -->
<section class="lp-s8 cey-bg-darker px-5">
    <div class="container d-flex justify-content-center py-4">
        <!-- <video loop height="678" src="../../resources/video/main.mp4" autoplay></video> -->
        <div style="position: relative; height: 400px; width: 100%;" class="overflow-hidden">
            <iframe style="scale: 140%;width: 100%; height: 100%; top: 0; left: 0;" src="https://www.youtube.com/embed/i0sUNC8Bylg?si=yEnvZ21On6fkD82f&rel=0&version=3&mute=1&autoplay=1&controls=0&&showinfo=0&loop=1&iv_load_policy=3&playlist=i0sUNC8Bylg" title="YouTube video player" frameborder="0" allow="autoplay;"></iframe>
            <!-- <iframe style="scale: 140%;width: 100%; height: 100%; top: 0; left: 0;" src="https://www.youtube.com/embed/QTdl4LazLdI?si=nTtt-VfpUHzTMwpE&rel=0?version=3&autoplay=1&controls=0&&showinfo=0&modestbranding=1&color=white" title="YouTube video player" frameborder="0" allow="autoplay;"></iframe> -->
            <div style="position: absolute; background-color: transparent;width: 100%; height: 100%; top: 0; left: 0;"></div>
            <!-- <iframe style="position: absolute; width: 100%; height: 100%; top: 0; left: 0;" id="ytplayer" type="text/html" width="720" height="405" src="https://www.youtube.com/embed/lpeuIu-ZYJY?autoplay=1&mute=1&controls=0&disablekb=1&fs=0&loop=1&modestbranding=1&color=white&rel=0?version=3&autoplay=1&controls=0&&showinfo=0&loop=1" frameborder="0"> -->
        </div>
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
                    <div class="swiper-slide cey-testamonial-card">
                        <h4 class="pb-4">TESTAMONIALS</h4>
                        <p class="text-center">Love the collection, keep up the great service. Appreciate l👍👍👍</p>
                        <p class="pt-3">- Umanga de Zoysa</p>
                    </div>
                    <div class="swiper-slide cey-testamonial-card">
                        <h4 class="pb-4">TESTAMONIALS</h4>
                        <p class="text-center">Good quality and stunning looks 👍</p>
                        <p class="pt-3">- Wathsala Gunawardana</p>
                    </div>
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
                    <div class="lp-s11-contacts">+94 78 482 2711</div>
                </div>
                <div class="cey-bg-dark p-1 d-flex align-items-center gap-lg-3 gap-md-3 gap-1">
                    <i class="bi bi-envelope-fill mx-1"></i>
                    <div class="lp-s11-contacts">kooplesclothing@gmail.com</div>
                </div>
                <div class="cey-bg-dark p-1 d-flex align-items-center gap-lg-3 gap-md-3 gap-1">
                    <i class="bi bi-geo-alt-fill mx-1"></i>
                    <div class="lp-s11-contacts">Kadawatha, Sri Lanka</div>
                </div>
            </div>
            <div class="lp-s11-right-box  cey-bg-dark cey-text-white d-flex flex-column justify-content-center col-lg-6 col-md-6">
                <h6 class="mx-lg-5 mx-sm-3 mx-3 mt-2">FOLLOW US ON</h6>
                <div class="d-flex gap-4 mx-lg-5 mx-sm-3 mx-3">
                    <a href="https://web.facebook.com/profile.php?id=100067952630177" class="cey-text-white" target="_blank"><i class="bi bi-facebook lp-s11-icon"></i></a>
                    <a href="https://www.instagram.com/kooplesclothing/" class="cey-text-white" target="_blank"><i class="bi bi-instagram bi-3x lp-s11-icon"></i></a>
                    <a href="https://www.linkedin.com/company/kooples-clothing/" class="cey-text-white" target="_blank"><i class="bi bi-linkedin bi-3x lp-s11-icon"></i></a>

                </div>
            </div>
        </div>
    </div>
</section>


<!-- section 12 - newsletter subscription  -->
<?php include(__DIR__ . "/../components/newsletter.php") ?>