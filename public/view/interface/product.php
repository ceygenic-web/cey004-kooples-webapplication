<!-- section 1 - content section -->
<section class="pp-s1 cey-bg-white">
    <div class="container py-3">
        <div class="d-flex flex-column">
            <div>
                <button onclick="history.back()" class="cey-bg-dark-main cey-text-light-main rounded-pill border-0 py-1 mb-3 px-3 cey-bg-darker cey-text-white">Back</button>
            </div>
            <h3 class="cey-main-font fw-bold cey-text-primary-400" id="productTitle">Here goes the Product Title</h3>
            <div>
                <button class="border-0 rounded-pill px-4 py-1 cey-bg-primary-400 cey-text-light-main cey-bg-dark" id="productCategory">Men</button>
                <button class="border-0 rounded-pill mx-2 px-4 py-1 cey-bg-primary-400 cey-text-light-main " id="productSubCategory">T Shirt</button>
            </div>
        </div>
        <div class=" d-flex flex-lg-row flex-column py-4 gap-3">
            <div class="pp-s1-swiper col-12 col-lg-6">
                <div thumbsSlider="" class="swiper mySwiper">
                    <div class="swiper-wrapper" id="productThumbSwiperContainer">
                        <div class="swiper-slide swiper-thumbs">
                            <img class="rounded-3" src="/public/resources/images/products/product-3.jpg" />
                        </div>
                        <div class="swiper-slide swiper-thumbs">
                            <img class="rounded-3" src="/public/resources/images/products/product-3.1.jpg" />
                        </div>
                    </div>
                </div>

                <!-- Swiper -->
                <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                    <div class="swiper-wrapper" id="productMainSwiperContainer">
                        <div class="swiper-slide">
                            <img src="/public/resources/images/products/product-3.jpg" />
                        </div>
                        <div class="swiper-slide">
                            <img src="/public/resources/images/products/product-3.1.jpg" />
                        </div>
                    </div>
                    <div class="swiper-button-next cey-text-primary-400 fw-bold"></div>
                    <div class="swiper-button-prev cey-text-primary-400 fw-bold"></div>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex flex-column justify-content-between" id="mainProductContainer">
                <!-- main container -->
                <div class="d-flex flex-column">
                    <div class="mb-4 border-3">
                        <h5 class="fw-bold">Description</h5>
                        <div>
                            The Northern Lights with all its glory has been executed with a plain colour textures and cotton mix Rayon combinations.
                            same yellow blouse it’s sure to bring light and wonder to your next special occassion.
                        </div>
                    </div>
                    <div class="mb-4">
                        <span class="py-2 px-3 cey-bg-primary-200 cey-text-light-main cey-text-white rounded-pill"><span class="cey-fs-1 fw-bold cey-text-primary">Wholesale Available</span></span>
                    </div>
                </div>
                <div class="d-flex flex-column">
                    <div class="my-4">
                        <span class="py-2 px-5 cey-bg-primary-300 cey-text-light-main cey-text-white rounded-pill"><span class="cey-fs-2 fw-bold cey-text-primary">1500 LKR</span></span>
                    </div>
                    <p class="cey-text-primary-300">Payments will be handles via whatsapp! Payment gates will be implimented soon</p>
                    <div class="d-flex gap-2">
                        <button class="col-6 cey-btn-primary fw-bold">PURCHASE</button>
                        <button class="col-6 cey-btn-dark cey-text-white fw-bold">ADD TO WATCH LIST</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="cey-bg-dark-main px-3 py-1 fw-bold cey-text-light-main rounded-pill my-3">More Information</div>
        <div class="col-12 p-3" id="secondaryProductContainer">
            <!-- secondary container -->
            <span class="fw-bold cey-fs-2">Material</span>
            <p>Material data will be loaded here...</p>
            <span class="fw-bold cey-fs-2">Any Other Data</span>
            <p>Everything Else will be loaded here...</p>
        </div>
    </div>
</section>

<!-- section 2 - related products -->
<section class="pp-s3">
    <div class="container py-4 d-flex flex-column justify-content-between">
        <h2 class="cey-ff-main cey-text-primary-400">MORE LIKE THIS...</h2>

        <div class="d-flex justify-content-between align-items-center">
            <div class="pp-s3-prev cey-fs-1 cey-text-primary-400"><i class="bi bi-caret-left-fill"></i></div>

            <div class="swiper py-4">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper" id="relatedProductContainer">

                </div>
            </div>

            <div class="pp-s3-next cey-fs-1 cey-text-primary-400"><i class="bi bi-caret-right-fill"></i></div>
        </div>
    </div>
</section>