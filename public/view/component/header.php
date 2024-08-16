<!DOCTYPE html>
<html lang="en">

<head>
       <meta charset="UTF-8">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title><?= PAGE_TITLE ?></title>

       <link rel="shortcut icon" href="<?= ROOT ?>resources/branding/favicon.ico">

       <!-- css -->
       <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" />
       <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css" />
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
       <link href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
       <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" /> -->
       <link rel="stylesheet" href="<?= ROOT ?>css/main.css">
       <link rel="stylesheet" href="<?= ROOT ?>css/components.css">
       <?php
       foreach (CSS_FILES as  $value) {
       ?>
              <link rel="stylesheet" href="<?= ROOT ?>css/<?= $value ?>.css" />
       <?php
       }
       ?>

       <!-- script -->
       <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
       <script defer src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
       <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
       <script defer src="https://cdn.datatables.net/2.0.8/js/dataTables.min.js"></script>
       <script defer src="<?= ROOT ?>js/modules/ExtendedDatatables.js"></script>
       <script defer src="<?= ROOT ?>js/modules/framework.js"></script>
       <script defer src="<?= ROOT ?>js/modules/ceygenic.js"></script>
       <script defer src="<?= ROOT ?>js/main.js"></script>
       <?php
       foreach (JAVASCRIPT_FILES as $value) {
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
       </script>
       <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=800038371555160&ev=PageView&noscript=1" /></noscript>
</head>

<body>
       <?php
       //check custom header
       if (!IS_CUSTOM_HEADER) {
              include_once("header-section.php");
       }
       ?>