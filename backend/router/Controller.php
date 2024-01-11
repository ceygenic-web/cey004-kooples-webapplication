<?php

require_once(__DIR__ . "/../model/CustomErrors.php");
require_once(__DIR__ . "/../model/SessionManager.php");

class Controller
{


    private static $isAdminLogin;

    private function definePageProperties($title, $js_files, $css_files)
    {
        define("PAGE_TITLE", $title);
        define("PAGE_JS_FILES", $js_files);
        define("PAGE_CSS_FILES", $css_files);

        self::$isAdminLogin = false;
    }

    public function view(string $name, string $title, array $js_files = [], array $css_files = [], bool $isAdmin = false, bool $custom = false)
    {
        if (!self::$isAdminLogin && $isAdmin) {
            $sessionManger = new SessionManager();
            $sessionManger->updateSessionVariable(SESSION_VARIABLE_ADMIN);
            if (!$sessionManger->isLoggedIn()) {
                var_dump("redirected");
                header("Location: /admin/login");
            }
        }

        $this->definePageProperties($title, $js_files, $css_files);
        $pageDir = (!$isAdmin)  ? __DIR__ . "/../../interface/pages/" : __DIR__ . "/../../interface/admin/pages/";

        if (!$custom) {
            include($pageDir . "header.php");
        }
        include($pageDir . $name . ".php");
        if (!$custom) {
            include($pageDir . "footer.php");
        }
    }

    public function admin(array $adminCall)
    {
        if (!isset($adminCall[1])) {
            $this->view("404", "Kooples Sri Lanka | 404 Not found");
        }

        $name = $adminCall[1];
        switch ($name) {
            case 'api':
                $this->adminApi($adminCall);
                break;
            case '':
                $this->view("home", "Kooples Admin | Home", ["admin-home"], ["admin"], true);
                break;

            case 'home':
                $this->view($name, "Kooples Admin | Home", ["admin-home"], ["admin"], true);
                break;

            case 'login':
                self::$isAdminLogin = true;
                $this->view($name, "Kooples Admin | Login", ["admin-signin"], ["admin"], true);
                break;

            case 'test':
                $this->view($name, "Kooples Admin | Test", ["admin-home"], ["admin"], true);
                break;

            default:
                $this->view("404", "Kooples Sri Lanka | 404 Not found");
                break;
        }
    }

    public function api(array $apiCall)
    {
        if (!isset($apiCall[1])) {
            CustomErrors::_404();
        }

        $apiName = $apiCall[1];
        switch ($apiName) {
            case 'product':
                $this->callApi($apiName, $apiCall);
                break;

            case 'test':
                $this->callApi($apiName, $apiCall);
                break;

            case 'category':
                $this->callApi($apiName, $apiCall);
                break;

            default:
                CustomErrors::_404();
                break;
        }
    }

    public function adminApi(array $apiCall)
    {
        if (!isset($apiCall[2])) {
            CustomErrors::_404();
        }

        $apiName = $apiCall[2];
        switch ($apiName) {
            case 'access':
                $this->callApi($apiName, $apiCall, true);
                break;

            case 'product':
                $this->callApi($apiName, $apiCall, true);
                break;

            default:
                CustomErrors::_404();
                break;
        }
    }

    private function callApi($apiName, $apiCall, bool $isAdmin = false)
    {

        $dir = (!$isAdmin) ? __DIR__ . "/../api/" : __DIR__ . "/../api/admin/";

        require($dir . $apiName . ".php");
        if (class_exists($apiName)) {
            $object = new $apiName($apiCall);
            $response = $object->callFunction();
            if (is_array($response) && $response[0]) {
                ResponseSender::sendJson($response[0], $response[1]);
            } else {
                ResponseSender::sendJson((object)["status" => "failed", "error" => "Something Went Wrong! at Server"]);
            }
        }
    }
}
