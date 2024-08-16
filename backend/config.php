<?php
// defauts
date_default_timezone_set('Asia/Colombo');

// server config
define("ROOT", "https://dev.kooplesclothing.com/public/");
define("SESSION_VARIABLE_ADMIN", "cey004_admin");
define("SESSION_VARIABLE_USER", "cey004_user");

// database config
define("DB_SERVER", "kooplesclothing.com");
define("DB_USERNAME", "kooplesc_kooples");
define("DB_PASSWORD", "SwFMjz5a1VCe");
define("DB_DATABASE", "kooplesc_kooples");

//constants
global $IS_RESPONSE_TEXT;
$IS_RESPONSE_TEXT = false;

// error messages
define("API_404_MESSAGE", "Invalid API URL");
define("INVALID_REQUEST_METHOD", "Invalid request method");
define("INVALID_ADMIN_ACCESS", "Access Denied!");

// frontend config
require_once(__DIR__ . "/../public/config.php");
