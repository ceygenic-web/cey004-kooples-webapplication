<?php
require_once(__DIR__ . "/../../model/AdminApi.php");
require_once(__DIR__ . "/../../model/RequestHandler.php");
require_once(__DIR__ . "/../../model/PasswordHash.php");

class Product extends AdminApi
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
                case 'productAddView':
                    return [$this->productAddView(), false];
                    break;

                case 'productUpdateView':
                    return [$this->productUpdateView(), false];
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }

    public function productAddView()
    {
        if (!$this->loggedAsAdmin()) {
            return  (object)["status" => "failed", "results" => "access denied"];
        }
        $results =  file_get_contents(__DIR__ . "/../../../interface/admin/pages/productAdd.php");
        return (object)["status" => "success", "results" => $results];
    }
    public function productUpdateView()
    {
        if (!$this->loggedAsAdmin()) {
            return  (object)["status" => "failed", "results" => "access denied"];
        }
        $results = file_get_contents(__DIR__ . "/../../../interface/admin/pages/productUpdate.php");
        return (object)["status" => "success", "results" => $results];
    }
}
