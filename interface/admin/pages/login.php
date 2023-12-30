<!-- section 1 - admin login -->
<section class="ad-s1 cey-bg-dark py-5">
    <div class="container py-3 d-flex justify-content-center align-items-center h-100">
        <form id="signInForm" class="col-12 col-lg-6 col-md-8 d-flex flex-column gap-3 cey-text-white" action="/admin/api/access/login" method="POST">
            <div class="text-center">
                <h2 class="cey-main-font">KOOPLES | ADMIN</h2>
                <h4 class="cey-main-font-light">Log In</h4>
                <hr>
            </div>
            <div class="col-12">
                <label class="form-label" for="mobile">Mobile</label>
                <input name="mobile" id="mobile" type="mobile" placeholder="Enter your mobile no" class="form-control">
            </div>
            <div class="col-12">
                <label class="form-label" for="password">Password</label>
                <input name="password" id="password" type="mobile" placeholder="Enter your password" class="form-control">
            </div>
            <div class="col-12">
                <button id="login" type="submit" class="w-100 cey-btn-box">Log In</button>
            </div>
        </form>
    </div>
</section>