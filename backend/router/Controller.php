<?php

require_once(__DIR__ . "/../model/CustomErrors.php");

class Controller
{
    public function view(string $name, string $title, array $js_files = [], array $css_files = [], bool $custom = false)
    {
        define("PAGE_TITLE", $title);
        define("PAGE_JS_FILES", $js_files);
        define("PAGE_CSS_FILES", $css_files);

        if (!$custom) {
            include(__DIR__ . "/../../interface/pages/header.php");
        }
        include(__DIR__ . "/../../interface/pages/" . $name . ".php");
        if (!$custom) {
            include(__DIR__ . "/../../interface/pages/footer.php");
        }
    }

    public function api(array $apiCall)
    {
        if (!isset($apiCall[1])) {
            CustomErrors::_404();
        }

        $apiName = $apiCall[1];
        switch ($apiName) {
            case 'cart':
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
}
