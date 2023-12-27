<?php
require_once(__DIR__ . "/../model/Api.php");
require_once(__DIR__ . "/../model/RequestHandler.php");

class Product extends Api
{

    private mixed $function;

    public function __construct(array $apiCall)
    {
        $this->function = ($apiCall[2]) ?? null;
    }



    public  function callFunction(): mixed
    {
        if ($this->function) {
            switch ($this->function) {
                case 'view':
                    return [$this->view(($_SERVER["REQUEST_METHOD"] === "GET") ? $_GET : []), false];
                    break;

                case 'add':
                    return [$this->add(), true];
                    break;

                default:
                    return false;
                    break;
            }
        } else {
            return false;
        }
    }

    public function view($params)
    {
        if ($params) {
        }

        // $this->sessionInit();
        // $this->sessionManager->updateSessionVariable("cey004_admin");

        // if (!$this->accessController()) {
        // return (object)["status" => "failed", "error" => "invalid access"];
        // }
        $results = $this->getData("SELECT * FROM `product` INNER JOIN `category` ON `product`.`category_category_id` = `category`.`category_id`  ");
        return (object)["status" => "success", "results" => $results];
    }

    public  function add()
    {
        if (RequestHandler::isPostMethod()) {
            $title = $_POST["title"];
            $description = $_POST["description"];
            $category = $_POST["category"];

            $categoryId = $this->getData("SELECT * FROM `category` WHERE `category` ='" . $category . "' ")[0]["category_id"];
            $id = mt_rand(000000, 999999);
            $this->updateData("INSERT INTO `product` (`product_id`,`category_category_id`, `title`, `description`) VALUES (?,?, ?, ?)", "siss", array($id, $categoryId, $title, $description));
            return "card data added";
        }
        return null;
    }
}
