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
</head>

<body>

    <!-- header -->
    <?php
    include("interface/components/header.php");
    ?>