<!-- product update section -->
<section class="productUpdate ad-s1 cey-bg-dark py-5">
    <div class="container py-5 d-flex justify-content-center align-items-center h-100 w-100 flex-column">
        <form method="POST" action="../../backend/api/product.php" class="col-12 col-lg-6 col-md-8 d-flex flex-column gap-1 cey-text-white">
            <label for="id">ID:</label>
            <input type="text" id="id" name="id"><br>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title"><br>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description"><br>
            <label for="category">Category:</label>
            <input type="text" id="category" name="category"><br>
            <input type="submit" value="Submit" class="col-6">
        </form>
    </div>
</section>