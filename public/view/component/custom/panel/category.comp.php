<h1>Category component</h1>


<section data-has-default-data data-admin-container="category add container" data-endpoint="/api/category/add" data-onsuccess="successProcess" data-onfailed="failedProcess otherAction">
    <div class="d-flex flex-column">
        <h4 class="text-center">Add Category</h4>
        <hr>
        <input type="text" name="subCategory" placeholder="Category">
        <button data-btn-action="add">Add Category</button>
    </div>
</section>

<section data-admin-container="category view container" data-endpoint="/api/category/get?type=main" data-view-type="table" data-is-view="ture" data-field="category category_id">
    <div class="d-flex flex-column" data-table-container>
    </div>
</section>

<section data-admin-container="category view container" data-endpoint="/api/category/get?type=sub" data-view-type="table" data-is-view="ture" data-field="sub_category sub_category_id">
    <div class="d-flex flex-column" data-table-container>
    </div>
</section>


<section data-admin-container="chart container" data-endpoint="/api/chart/get" data-chart-type="pie" data-is-view="ture" data-refresh-interval="10000">
    <h1>test</h1>

    <div class="d-flex flex-column" data-chart-container>
    </div>
</section>