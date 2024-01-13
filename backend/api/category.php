<?php
require_once(__DIR__ . "/../model/Api.php");
require_once(__DIR__ . "/../model/RequestHandler.php");

class Category extends Api
{

    private mixed $function;

    public function __construct(array $apiCall)
    {
        $this->function = ($apiCall[2]) ?? null;
    }



    public function callFunction(): mixed
    {
        if ($this->function) {
            switch ($this->function) {
                case 'get':
                    return [$this->get(), false];
                    break;
                case 'getsub':
                    return [$this->getsub(), false];
                    break;

                case 'add':
                    return [$this->add(), true];
                    break;

                case 'update':
                    return [$this->update(), true];
                    break;

                case 'delete':
                    return [$this->delete(), true];
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }

    public function get()
    {
        $query = "SELECT * FROM `category`";
        $results = $this->getData($query);
        return (object)["status" => "success", "results" => $results];
    }

    public function getsub()
    {
        $query = "SELECT * FROM `sub_categories`";
        $results = $this->getData($query);
        return (object)["status" => "success", "results" => $results];
    }

    public  function add()
    {
        return (object)["status" => "success"];
    }

    public function update()
    {
        return (object)["status" => "success"];
    }

    public function delete()
    {
        if (RequestHandler::isPostMethod()) {
            $id = $_POST["id"];
            $this->updateData("DELETE FROM `category` WHERE `category_id`='" . $id . "' ");
            return (object)["status" => "success"];
        }
        return (object)["status" => "failed", "error" => "invalid request"];
    }
}
