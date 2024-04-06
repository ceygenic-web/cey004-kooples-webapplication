<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PAGE_TITLE ?></title>
    <meta name="description" content="Shop for handcrafted sarees. We are promoting traditional handloom saree and apparel craftmanship in Sri Lanka.">
    <meta property="og:site_name" content="Kooples Clothing">
    <meta property="og:title" content="Kooples Clothing Sri Lanka" />
    <meta property="og:description" content="Shop for handcrafted sarees. We are promoting traditional handloom saree and apparel craftmanship in Sri Lanka." />
    <meta property="og:image" itemprop="image" content="/resources/images/logo.png">
    <meta property="og:type" content="product" />

    <link rel="shortcut icon" href="resources/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link rel="stylesheet" href="<?= ROOT ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= ROOT ?>css/main.css">
    <?php
    foreach (PAGE_CSS_FILES as $value) {
    ?>
        <link rel="stylesheet" href="<?= ROOT ?>css/<?= $value ?>.css">
    <?php
    }
    ?>
    <link rel="stylesheet" href="<?= ROOT ?>css/style.css">
    <link rel="stylesheet" href="<?= ROOT ?>css/style.large.css">
    <link rel="stylesheet" href="<?= ROOT ?>css/style.medium.css">
    <link rel="stylesheet" href="<?= ROOT ?>css/style.small.css">

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="https://player.vimeo.com/api/player.js"></script>
    <script defer src="<?= ROOT ?>js/bootstrap.bundle.js"></script>
    <script defer src="<?= ROOT ?>js/modules/framework.js"></script>
    <script defer src="<?= ROOT ?>js/main.js"></script>
    <?php
    foreach (PAGE_JS_FILES as $value) {
    ?>
        <script defer src="<?= ROOT ?>js/<?= $value ?>.js"></script>
    <?php
    }
    ?>


    <!-- meta pixcel -->
    <!-- Meta Pixel Code -->
    <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '800038371555160');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=800038371555160&ev=PageView&noscript=1" /></noscript>
    <!-- End Meta Pixel Code -->
</head>

<body>

    <!-- header -->
    <?php
    include("interface/components/header.php");
    ?>