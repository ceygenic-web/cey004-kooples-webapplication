<hr>
<h1 class="text-center">Selector Auto Load Sections</h1>
<hr>

<section class="image-picker-section" data-admin-container="picker_1">
    <select id="mutationTest" name="gender" data-options='[[0, "Select a Gender"],[1,"Male"],[2,"Female"],[3,"Other"]]'></select>
    <select name="age_range" data-options="[[1, &quot;Me&quot;],[2,&quot;You&quot;]]" ></select>
</section>



<hr>
<h1 class="text-center">Test Image Sections</h1>
<hr>


<section class="image-picker-section" data-admin-container="picker_1">
    <div class="container image-picker-container" id="picker_1" data-image-picker="1" data-name="profileImage">
        <h1 class="header">Image Picker</h1>
        <div class="image-picker imagePicker">
            <label>Click or Drop Images Here
                <input type="file" class="imageInput hidden-input" accept="image/*" multiple
                    aria-labelledby="imageInput" />
            </label>
        </div>
        <div class="thumbnails" class="thumbnails"></div>
        <button class="download-btn downloadBtn">Download Images</button>
        <div class="alertContainer"></div>
        <div class="loading-screen" class="loading-screen">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <hr>

    <div class="container image-picker-container" id="picker_1231" data-image-picker="4" data-name="myImages">
        <h1 class="header">Image Picker 4</h1>
        <div class="image-picker imagePicker">
            <label>Click or Drop Images Here
                <input type="file" class="imageInput hidden-input" accept="image/*" multiple
                    aria-labelledby="imageInput" />
            </label>
        </div>
        <div class="thumbnails" class="thumbnails"></div>
        <button class="download-btn downloadBtn">Download Images</button>
        <div class="alertContainer"></div>
        <div class="loading-screen" class="loading-screen">
            <div class="loading-spinner"></div>
        </div>
    </div>
</section>

<section class="image-picker-section" data-admin-container="picker_2" data-endpoint="/api/category/add">
    <div class="container image-picker-container" id="picker_2" data-image-picker="2" data-name="profileImage">
        <h1 class="header">Image Picker</h1>
        <div class="image-picker imagePicker">
            <label>Click or Drop Images Here
                <input type="file" class="imageInput hidden-input" accept="image/*" multiple
                    aria-labelledby="imageInput" />
            </label>
        </div>
        <div class="thumbnails" class="thumbnails"></div>
        <button class="download-btn downloadBtn">Download Images</button>
        <div class="alertContainer"></div>
        <div class="loading-screen" class="loading-screen">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <div class="container image-picker-container" id="picker_3" data-image-picker="3" data-name="productImage">
        <h1 class="header">Image Picker</h1>
        <div class="image-picker imagePicker">
            <label>Click or Drop Images Here
                <input type="file" class="imageInput hidden-input" accept="image/*" multiple
                    aria-labelledby="imageInput" />
            </label>
        </div>
        <div class="thumbnails" class="thumbnails"></div>
        <button class="download-btn downloadBtn">Download Images</button>
        <div class="alertContainer"></div>
        <div class="loading-screen" class="loading-screen">
            <div class="loading-spinner"></div>
        </div>
    </div>

    <button data-btn-action="add">Add</button>
</section>