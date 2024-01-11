<!-- admin home page -->
<!-- section 1 - home main -->
<section class="ahp-s1 cey-bg-dark py-2">
    <div class="container d-flex cey-text-white flex-wrap py-3 cey-bg-darker">
        <div class="p-3 col-12 col-lg-4 border-secondary border-1 border-end d-flex flex-column gap-3">
            <button data-panel="product" class="admin-navigation-button cey-btn-box w-100">Products</button>
            <button data-panel="blog" class="admin-navigation-button cey-btn-box w-100">Blog</button>
            <button data-panel="user" class="admin-navigation-button cey-btn-box w-100">User</button>
        </div>
        <div class="admin-main-container p-3 col-12 col-lg-8" id="adminMainContainer">
            <div class="overflow-auto admin-panel w-100 h-100 d-block" id="product"></div>
            <div class="overflow-auto admin-panel w-100 h-100 d-none" id="blog"></div>
            <div class="overflow-auto admin-panel w-100 h-100 d-none" id="user"></div>
        </div>
    </div>
</section>