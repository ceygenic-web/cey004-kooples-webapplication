<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEY004 - Kooples Web Applcation</title>

    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">

    <!-- css -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style.large.css">
    <link rel="stylesheet" href="css/style.medium.css">
    <link rel="stylesheet" href="css/style.small.css">

    <!-- script -->
    <script defer src="js/bootstrap.bundle.js"></script>
    <script defer src="js/main.js"></script>
</head>

<body>

    <!-- header -->
    <?php
    include("interface/components/header.php");
    ?>

    <!-- section1 - hero section -->
    <section class="cey-bg-dark lp-s1 d-flex align-items-center">
        <div class="container h-100">
            <div class="w-100 h-100 d-flex gap-3 justify-content-center align-items-center flex-column">
                <div class="d-flex fw-bold gap-2 lp-s1-branding-quotes justify-content-center align-items-center">
                    <div>GRACE</div>
                    <div class="lp-s1-dot"></div>
                    <div>DIGNITY</div>
                    <div class="lp-s1-dot"></div>
                    <div>IDENTITY</div>
                </div>
                <h1 class="cey-text-white">FIRST HEADING GOES HERE</h1>
                <div class="lp-s1-searchbar">
                    <input type="text" placeholder="search your dream saree....">
                    <i class="fs-2 bi bi-search"></i>
                </div>
            </div>
        </div>
    </section>

    <!--  footer -->
    <?php
    include("interface/components/footer.php");
    ?>

</body>

</html>