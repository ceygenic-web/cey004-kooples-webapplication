<!-- section 1 - content section -->
<section class="pp-s1 cey-bg-white">
    <div class="container py-3">
        <div class="d-flex flex-column">
            <div>
                <button onclick="history.back()" class="border-0 py-1 mb-3 px-3 cey-bg-darker cey-text-white">Back</button>
            </div>
            <h3 class="cey-main-font" id="productTitle"></h3>
            <div class="dropdown">
                <button class="px-3 py-1 cey-border-dark cey-text-white cey-bg-dark" id="productCategory"></button>
                <button class="mx-2 px-2 py-1 cey-border-dark cey-text-dark " id="productSubCategory"></button>
            </div>
        </div>
        <div class=" d-flex flex-lg-row flex-column py-4 gap-3">
            <div class="pp-s1-swiper col-12 col-lg-6">
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper" id="productThumbSwiperContainer">
                        <!-- <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                        </div> -->
                    </div>
                </div>

                <!-- Swiper -->
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper" id="productMainSwiperContainer">
                        <!-- <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-1.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-2.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-4.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-5.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-6.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-7.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-8.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-9.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="https://swiperjs.com/demos/images/nature-10.jpg" />
                        </div> -->
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-between" id="mainProductContainer">
                <!-- main container -->
            </div>
        </div>
        <div class="cey-bg-dark px-3 py-1 cey-text-white my-3">More Information</div>
        <div class="col-12 p-3" id="secondaryProductContainer">
            <!-- secondary container -->
        </div>
    </div>
</section>

<!-- section 2 - related products -->
<section class="pp-s2 cey-bg-dark" id="relatedProductSection">
    <div class="container py-4 h-100 d-flex flex-column">
        <h3 class="cey-text-white">MORE LIKE THIS...</h3>
        <div class="py-1 d-flex gap-4 flex-wrap justify-content-between flex-grow-1">
            <div class="swiper mySwiper3 h-100">
                <div class="pp-s2-controls w-100 d-flex justify-content-between position-absolute p-3 h-100 align-items-center">
                    <div class="pp-s2-swiper-control"><i class="pp-s2-swiper-control-left fs-1 cey-text-white bi bi-arrow-left-circle"></i></div>
                    <div class="pp-s2-swiper-control"><i class="pp-s2-swiper-control-right fs-1 cey-text-white bi bi-arrow-right-circle"></i></div>
                </div>
                <div class="swiper-wrapper py-5" id="relatedProductContainer">
                    Loading...
                </div>
            </div>
        </div>
</section>