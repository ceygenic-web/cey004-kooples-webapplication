test
<?php

require_once("backend/router/Router.php");
require_once("backend/config.php");
require_once("backend/model/DatabaseDriver.php");


$router = new Router($_SERVER);
$router->init();
