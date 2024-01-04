<!-- section 1 - product category banner -->
<section class="sp-s1 cey-bg-darker">
    <div class="h-100 container d-flex justify-content-center align-items-center">

    </div>
</section>

<!-- section 2 - Search bar -->
<section class="sp-s2 cey-bg-dark p-2">
    <div class="container d-flex gap-2 flex-md-row flex-column">
        <div class="order-1 order-md-0 col-12 col-md-4 sp-s2-dropdown fs-5 text-center fw-bold cey-main-font position-relative d-flex flex-column">
            <span class=" cey-bg-white sp-s2-dropdown-btn cey-text-dark p-2 flex-grow-1">CATEGORIES</span>
            <ul id="shopCategoryDropdown" class="sp-s2-dropdown-list p-3 cey-bg-primary-light cey-text-dark flex-column position-absolute w-100">
                <li>ANY CATEGORY</li>
            </ul>
        </div>
        <div class="order-0 order-md-1 col-12 col-md-8 d-flex">
            <input onchange="searchBar(event)" class="p-2 w-75 cey-border-white cey-outline-light" type="text" placeholder="Type here to search..." />
            <button class="cey-main-font cey-btn-box w-25 fs-5"><span class="d-none d-md-block">SEARCH</span><i class="bi bi-search d-block d-md-none"></i></button>
        </div>
    </div>
</section>


<!-- section 3 - products section -->
<section class="sp-s3 cey-bg-white">
    <div id="mainProductContainer" class="sp-s3-main-container container px-5 py-1 d-flex flex-wrap gap-5 justify-content-between vh-100 overflow-auto py-5">
        <?php
        for ($i = 0; $i < 0; $i++) {
        ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 col-xl-3 d-flex justify-content-center align-items-center bg-danger">
                <div class="cey-product-item-card cey-shadow-light">
                    <img src="resources/images/hero.jpg" height="100%" width="100%">
                    <div class="content">
                        <h6 class="fw-bold">Porduct Title</h6>
                        <p>product descriptino of small content will be here and it will be very short...</p>
                        <button class="cey-btn-box"><span class="me-3">CART</span> <i class="bi-cart"></i></button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
    <div class="sp-s3-pagination-container d-flex justify-content-center py-4">
        <div class="cey-bg-primary-light d-flex">
            <div class="px-2 py-1 cey-text-white cey-bg-dark">B</div>
            <div class="px-2 py-1">1</div>
            <div class="px-2 py-1">2</div>
            <div class="px-2 py-1">...</div>
            <div class="px-2 py-1 cey-text-white cey-bg-dark">N</div>
        </div>
    </div>
</section>