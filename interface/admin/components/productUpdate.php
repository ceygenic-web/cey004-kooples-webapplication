<!-- product update section -->
<section id="productUpdateMainContainer" class="d-none productUpdate ad-s1 cey-bg-dark py-5">
    <div class="container py-5 d-flex justify-content-center align-items-center h-100 w-100 flex-column">
        <h1 class="cey-text-white">Update products</h1>
        <div id="productUpdateView" class="col-12 d-flex flex-column gap-1 cey-text-white">
            <div class="d-flex flex-column">
                <label for="id">ID:</label>
                <input class="form-control" type="text" id="update_id" name="id"><br>
                <label for="title">Title:</label>
                <input class="form-control" type="text" id="update_title" name="title"><br>
                <label for="description">Description:</label>
                <textarea class="form-control" id="update_description" name="description" cols="30" rows="5"></textarea><br>
                <label for="category">Category:</label>
                <select class="form-select" id="productUpdateViewcategory" name="category"></select><br>
                <label for="productUpdateViewSubCategory">Sub Category:</label>
                <select class="form-select" id="productUpdateViewSubCategory" name="sub_category"></select><br>
                <label for="blousepiece">Blousepiece</label>
                <input type="text" id="update_blousepiece" name="blousepiece" class="form-control"><br>
                <label for="style_number">Style number</label>
                <input type="text" id="update_style_number" name="style_number" class="form-control"><br>
                <label for="category">Shipping info</label>
                <input type="text" id="update_shipping_info" name="shipping_info" class="form-control"><br>
                <label for="returns">Returns</label>
                <input type="text" id="update_returns" name="returns" class="form-control"><br>
                <label for="measurements">Measurements</label>
                <input type="text" id="update_measurements" name="measurements" class="form-control"><br>
                <label for="wash_instructions">Wash and care instructions</label>
                <input type="text" id="update_wash_instructions" name="wash_instructions" class="form-control"><br>
                <label for="fabric">Fabric Composition</label>
                <input type="text" id="update_fabric" name="fabric" class="form-control"><br>
                <label for="price">Price</label>
                <input type="text" id="update_price" name="price" class="form-control"><br>
                <button class="btn btn-primary" onclick="updateProductData()">Update</button>
            </div>
        </div>
    </div>
</section>