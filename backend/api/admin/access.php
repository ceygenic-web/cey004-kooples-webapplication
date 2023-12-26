<?php
require_once(__DIR__ . "/../../model/Api.php");
require_once(__DIR__ . "/../../model/RequestHandler.php");

class Access extends Api
{
    private mixed $function;

    public function __construct(array $apiCall)
    {
        $this->function = ($apiCall[3]) ?? null;
    }

    public  function callFunction(): mixed
    {
        if ($this->function) {
            switch ($this->function) {
                case 'login':
                    return [$this->login(($_SERVER["REQUEST_METHOD"]) ? $_GET : []), false];
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }

    public function login($params, $method = null)
    {
        return (object)["status" => "success"];
    }
}
