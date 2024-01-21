<!-- admin home page -->
<!-- section 1 - home main -->
<section class="ahp-s1 cey-bg-dark py-2">
    <div class="container d-flex cey-text-white flex-wrap py-3 cey-bg-darker">
        <div class="p-3 col-12 col-lg-4 border-secondary border-1 border-end d-flex flex-column gap-3">
            <button data-panel="productAddViewContainer" class="admin-navigation-button cey-btn-box w-100">Add Products</button>
            <button data-panel="productUpdateViewContainer" class="admin-navigation-button cey-btn-box w-100">Update Products</button>
            <button data-panel="user" class="admin-navigation-button cey-btn-box w-100">User</button>
        </div>
        <div class="admin-main-container p-3 col-12 col-lg-8" id="adminMainContainer">
            <div class="overflow-auto admin-panel w-100 h-100 d-block" id="productAddViewContainer"></div>
            <div class="overflow-auto admin-panel w-100 h-100 d-none" id="productUpdateViewContainer">
                <div class="d-flex flex-column gap-2">
                    <input class="form-control" type="text" id="productUpdateOpenModelIdInputs" />
                    <button onclick="openUpdateProductModel(event)" class="btn btn-secondary">open update model</button>
                </div>
            </div>
            <div class="overflow-auto admin-panel w-100 h-100 d-none" id="user"></div>
        </div>
    </div>
</section>