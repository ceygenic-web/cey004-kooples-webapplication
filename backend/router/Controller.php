<?php

require_once(__DIR__ . "/../model/CustomErrors.php");

class Controller
{

    private function definePageProperties($title, $js_files, $css_files)
    {
        define("PAGE_TITLE", $title);
        define("PAGE_JS_FILES", $js_files);
        define("PAGE_CSS_FILES", $css_files);
    }

    public function view(string $name, string $title, array $js_files = [], array $css_files = [], bool $custom = false)
    {
        $this->definePageProperties($title, $js_files, $css_files);

        if (!$custom) {
            include(__DIR__ . "/../../interface/pages/header.php");
        }
        include(__DIR__ . "/../../interface/pages/" . $name . ".php");
        if (!$custom) {
            include(__DIR__ . "/../../interface/pages/footer.php");
        }
    }

    public function adminView(string $name, string $title, array $js_files = [], array $css_files = [], bool $custom = false)
    {
        $this->definePageProperties($title, $js_files, $css_files);

        if (!$custom) {
            include(__DIR__ . "/../../interface/admin/components/header.php");
        }
        include(__DIR__ . "/../../interface/admin/pages/" . $name . ".php");
        if (!$custom) {
            include(__DIR__ . "/../../interface/admin/components/footer.php");
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

            case 'login':
                $this->adminView($name, "Kooples Admin | Login");
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
                $this->callAdminApi($apiName, $apiCall);
                break;

            default:
                CustomErrors::_404();
                break;
        }
    }

    private function callApi($apiName, $apiCall)
    {
        require(__DIR__ . "/../api/" . $apiName . ".php");
        if (class_exists($apiName)) {
            $object = new $apiName($apiCall);
            $response = $object->callFunction();
            if ($response !== false) {
                ResponseSender::sendJson($response[0], $response[1]);
            } else {
                CustomErrors::_404();
            }
        }
    }

    private function callAdminApi($apiName, $apiCall)
    {
        require(__DIR__ . "/../api/admin/" . $apiName . ".php");
        if (class_exists($apiName)) {
            $object = new $apiName($apiCall);
            $response = $object->callFunction();
            if ($response !== false) {
                ResponseSender::sendJson($response[0], $response[1]);
            } else {
                CustomErrors::_404();
            }
        }
    }
}
