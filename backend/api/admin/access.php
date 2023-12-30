<?php
require_once(__DIR__ . "/../../model/Api.php");
require_once(__DIR__ . "/../../model/RequestHandler.php");
require_once(__DIR__ . "/../../model/PasswordHash.php");

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
                    return [$this->login(($_SERVER["REQUEST_METHOD"] === "POST") ? $_POST : null), false];
                    break;

                case 'check':
                    return [$this->check(($_SERVER["REQUEST_METHOD"] === "POST") ? $_POST : null), false];
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }

    public function login($params)
    {
        // validate data
        if (!$params) {
            return false;
        }

        $mobile = $params["mobile"];
        $password = $params["password"];
        $errors = $this->validateData((object)[
            "id_int" => [(object)["datakey" => "mobile", "value" => $mobile]],
            "password" => [(object)["datakey" => "password", "value" => $password]],
        ]);

        foreach ($errors as $key => $value) {
            if ($value) {
                return (object) ["status" => "failed", "error" => [$key, $value]];
            }
        }

        // get the user data
        $userData = $this->getData("SELECT * FROM `admin` WHERE `mobile` = ?", "s", [$mobile])[0];
        // match passwords
        if (PasswordHash::isValid($password, $userData["password_hash"])) {
            $this->sessionInit();
            $this->sessionManager->updateSessionVariable("cey004_admin");
            $this->sessionManager->login($userData["id"]);
            return (object)["status" => "success"];
        }
        return (object)["status" => "failed", "error" => "invalid user data!"];
    }

    public function check()
    {
        $this->sessionInit();
        $this->sessionManager->updateSessionVariable("cey004_admin");
        if ($this->checkAccess() !== true) {
            return $this->checkAccess();
        }
        return "success";
    }
}
