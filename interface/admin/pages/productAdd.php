<!-- product add section -->
<section class="productAdd ad-s1 cey-bg-dark py-5">
    <div class="container py-5 d-flex justify-content-center align-items-center h-100 w-100 flex-column">
        <h1 class="cey-text-white">Add products</h1>
        <form id="productAdd" class="col-12 col-lg-6 col-md-8 d-flex flex-column gap-1 cey-text-white" method="POST" action="../../backend/api/product.php">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control"><br>
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control"><br>
            <label for="category">Category</label>
            <input type="text" id="category" name="category" class="form-control"><br>
            <label for="blousepiece">Blousepiece</label>
            <input type="text" id="blousepiece" name="blousepiece" class="form-control"><br>
            <label for="style_number">Style number</label>
            <input type="text" id="style_number" name="style_number" class="form-control"><br>
            <label for="category">Shipping info</label>
            <input type="text" id="shipping_info" name="shipping_info" class="form-control"><br>
            <label for="returns">Returns</label>
            <input type="text" id="returns" name="returns" class="form-control"><br>
            <label for="measurements">Measurements</label>
            <input type="text" id="measurements" name="measurements" class="form-control"><br>
            <label for="wash_instructions">Wash and care instructions</label>
            <input type="text" id="wash_instructions" name="wash_instructions" class="form-control"><br>
            <label for="fabric">Fabric Composition</label>
            <input type="text" id="fabric" name="fabric" class="form-control"><br>
            <label for="price">Price</label>
            <input type="text" id="price" name="price" class="form-control"><br>
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