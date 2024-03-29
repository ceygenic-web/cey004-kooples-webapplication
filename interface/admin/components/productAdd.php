<!-- product add section -->
<section class="productAdd ad-s1 cey-bg-dark py-5">
    <div class="container py-5 d-flex justify-content-center align-items-center w-100 flex-column">
        <h1 class="cey-text-white">Add products</h1>
        <form id="productAdd" class="col-12 col-lg-6 col-md-8 d-flex flex-column gap-1 cey-text-white w-100">
            <label for="title">Title</label>
            <input type="text" id="add_title" name="title" class="form-control" placeholder="add product title"><br>
            <label for="description">Description</label>
            <textarea placeholder="add product description..." id="add_description" name="description" class="form-control" cols="30" rows="10"></textarea><br>
            <label for="productAddViewcategory">Category</label>
            <!-- <input type="text" id="add_category" name="category" class="form-control"><br> -->
            <select name="category" id="productAddViewcategory" class="form-select"></select>
            <label for="productAddViewSubCategory">Sub Category</label>
            <select name="sub_category" id="productAddViewSubCategory" class="form-select"></select>
            <label for="add_images">Images</label>
            <input onchange="updateAddImagePreview(event)" type="file" multiple id="add_images" name="images" class="form-control"><br>
            <div class="d-flex bg-dark overflow-auto p-2" id="addImagePreviewBox">

            </div>
            <label for="blousepiece">Blousepiece</label>
            <input type="text" id="add_blousepiece" name="Blousepiece" class="form-control"><br>
            <label for="style_number">Style number</label>
            <input type="text" id="add_style_number" name="Style Number" class="form-control"><br>
            <label for="category">Shipping info</label>
            <input type="text" id="add_shipping_info" name="Shipping Info" class="form-control"><br>
            <label for="returns">Returns</label>
            <input type="text" id="add_returns" name="Returns" class="form-control"><br>
            <label for="measurements">Measurements</label>
            <input type="text" id="add_measurements" name="Measurements" class="form-control"><br>
            <label for="wash_instructions">Wash and care instructions</label>
            <input type="text" id="add_wash_instructions" name="Wash and Care Instructions" class="form-control"><br>
            <label for="fabric">Fabric Composition</label>
            <input type="text" id="add_fabric" name="Fabric Composition" class="form-control"><br>
            <label for="price">Price (LKR)</label>
            <input type="number" id="add_price" name="price" class="form-control"><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</section>

<!-- Blousepiece
Style number 
Shipping info 
Returns 
Measurements
Wash and care instructions
Fabric Composition 
Price  -->