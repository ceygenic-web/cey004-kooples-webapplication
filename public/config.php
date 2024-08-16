<?php
//routes
define("ROUTES", [
    [
        "routes" => ["", "home"],
        "fileName" => "home",
        "title" => "CRISP PAISLEY",
        "js" => ["modules/Component", "home"],
        "css" => ["home"],
        "isCustom" => false
    ],
    [
        "routes" => ["shop"],
        "fileName" => "shop",
        "title" => "CRISP PAISLEY | Shop",
        "js" => ["modules/Component", "shop"],
        "css" => ["shop"],
        "isCustom" => false
    ],
    [
        "routes" => ["product"],
        "fileName" => "product",
        "title" => "CRISP PAISLEY | Product",
        "js" => ["modules/Component", "product"],
        "css" => ["product"],
        "isCustom" => false
    ],
    [
        "routes" => ["test"],
        "fileName" => "test",
        "title" => "CRISP PAISLEY | Test Page",
        "js" => ["test"],
        "css" => ["test"],
        "isCustom" => false
    ],
    [
        "routes" => ["admin/login"],
        "fileName" => "admin/adminLogin",
        "title" => "CRISP PAISLEY | Admin Login",
        "js" => ["admin/login"],
        "css" => [],
        "isCustom" => true
    ],
    [
        "routes" => ["admin"],
        "fileName" => "admin/adminHome",
        "title" => "CRISP PAISLEY | Admin Panel",
        "js" => [
            "modules/EventManager",
            "modules/ToastManager",
            "modules/Component",
            "admin/Core",
            "admin/Panel",
            "admin/panels/UserPanel",
            "admin/panels/ProductPanel",
            "admin/panels/CategoryPanel",
            "admin/panels/StockPanel",
            "admin/AdminPanel",
            "admin/admin"
        ],
        "css" => ["admin/admin"],
        "isCustom" => true
    ],
]);
