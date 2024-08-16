<!-- admin Sign In  Page -->
<section class="cey-bg-dark-secondary vh-100 p-2 d-flex justify-content-center align-items-center">
    <div class="container cey-text-light-main d-flex justify-content-center align-items-center flex-column">

        <div class="text-center">
            <h1>Blanks Clothing | Admin</h1>
            <h2 class="fs-4">Admin Log In</h2>
        </div>


        <div class="col-12 col-md-4">
            <form action="api/admin/login" method="post">
                <label for="adminLoginEmailInput" class="form-label mt-2">Email</label>
                <input name="email" placeholder="Enter your admin email" type="text" id="adminLoginEmailInput" class="form-control rounded-pill">
                <label for="adminLoginPasswordInput" class="form-label mt-2">Password</label>
                <input name="password" placeholder="Enter your password" type="password" id="adminLoginPasswordInput" class="form-control rounded-pill">
            </form>
            <button onclick="login()" class="btn cey-btn-secondary rounded-pill mt-3 w-100">Log in as admin</button>
        </div>
    </div>
</section>