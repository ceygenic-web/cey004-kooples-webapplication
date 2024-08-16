<?php
require_once(__DIR__ .  "/../../../../backend/api/Admin.php");

$admin = new Admin([], false);

if (!$admin->is_logged()) {
    header("Location: /admin/login");
}

?>

<!-- admin Page header -->
<section class="cey-bg-light vh-100 d-flex flex-column">
    <div class="d-flex flex-column">
        <div class="cey-bg-primary-400 px-5 py-2">
            <button class="cey-btn-dark">Some Button 1</button>
            <button class="cey-btn-dark">Some Button 2</button>
            <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                MENU
            </button>
            <div class="flex-grow-1 cey-bg-dark-main">
                <div class="offcanvas offcanvas-start p-2" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <button onclick="AdminPanel.switchPanel('user')" class="btn btn-dark my-2 rounded-pill">User</button>
                    <button onclick="AdminPanel.switchPanel('product')" class="btn btn-dark my-2 rounded-pill">Product</button>
                    <button onclick="AdminPanel.switchPanel('stock')" class="btn btn-dark my-2 rounded-pill">Stock</button>
                    <button onclick="AdminPanel.switchPanel('category')" class="btn btn-dark my-2 rounded-pill">Category</button>
                </div>
            </div>
        </div>
    </div>

    <div id="adminMainContainer" class="cey-bg-light-main flex-grow-1 p-5">
        <table id="sampleTable" class="display">
            <thead>
                <tr>
                    <th>Column 1</th>
                    <th>Column 2</th>
                    <th>Column 3</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <div class="cey-bg-dark-secondary py-3 d-flex justify-content-center">
        All Right Reserved | 2024
    </div>
</section>