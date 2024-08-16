<h1>Product component</h1>


<section data-admin-container="product add container" data-endpoint="/api/product/add">
    <div class="d-flex flex-column">
        <input type="text" name="title" placeholder="Title">
        <input type="text" name="description" placeholder="Description">
        <select name="category">
            <option value="0">None</option>
            <option value="1">Option 1</option>
            <option value="2">Option 2</option>
        </select>
        <select name="promotion">
            <option value="0">None</option>
            <option value="5">Promotion 1</option>
        </select>
        <button data-btn-action="add">+</button>
    </div>
</section>