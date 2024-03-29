<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= PAGE_TITLE ?></title>

    <link rel="shortcut icon" href="<?= ROOT ?>resources/images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="<?= ROOT ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?= ROOT ?>css/main.css">
    <?php
    foreach (PAGE_CSS_FILES as $value) {
    ?>
        <link rel="stylesheet" href="<?= ROOT ?>css/admin/<?= $value ?>.css">
    <?php
    }
    ?>

    <!-- script -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script defer src="<?= ROOT ?>js/bootstrap.bundle.js"></script>
    <script defer src="<?= ROOT ?>js/modules/framework.js"></script>
    <script defer src="<?= ROOT ?>js/main.js"></script>
    <?php
    foreach (PAGE_JS_FILES as $value) {
    ?>
        <script defer src="<?= ROOT ?>js/admin/<?= $value ?>.js"></script>
    <?php
    }
    ?>
</head>

<body>

    <!-- header -->
    <?php
    include("interface/admin/components/header.php");
    ?>