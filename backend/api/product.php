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



    public function callFunction(): mixed
    {
        if ($this->function) {
            switch ($this->function) {
                case 'view':
                    return [$this->view(($_SERVER["REQUEST_METHOD"] === "GET") ? $_GET : []), false];
                    break;

                case 'add':
                    return [$this->add(), true];
                    break;

                case 'upload-image':
                    return [$this->uploadImage(), true];
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

    public function view($params)
    {
        $query = "SELECT * FROM `product` INNER JOIN `category` ON `product`.`category_category_id` = `category`.`category_id` ";
        if ($params) {
            $query .= (isset($params["search"])) ? " WHERE (`product`.`title` LIKE '%" . $params["search"] . "%' OR `product`.`description` LIKE '%" . $params["search"] . "%' OR `category`.`category` LIKE '%" . $params["search"] . "%') " : " ";
            $query .= (isset($params["product"]) && !isset($params["search"])) ? " WHERE `product`.`product_id` = '" . $params["product"] . "' " : " ";
            $query .= (isset($params["category"])  && !isset($params["search"])) ? " WHERE `category`.`category` = '" . $params["category"] . "' " : " ";
            $query .= (isset($params["category"])  && isset($params["search"])) ? " AND `category`.`category` = '" . $params["category"] . "' " : " ";
            $query .= (isset($params["limit"])) ? " LIMIT " . $params["limit"] . "  " : " ";
        }
        // $results = $this->getData($query);
        var_dump($query);
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
            return (object)["status" => "success"];
        }
        return (object)["status" => "failed", "error" => "invalid request"];
    }

    public  function uploadImage()
    {
        if (RequestHandler::isPostMethod()) {
            $image = $_FILES["image"];
            if ($image["type"] !== "image/jpeg") {
                return (object)["status" => "failed", "error" => "Invalid File Format"];
            }
            move_uploaded_file($image["tmp_name"], __DIR__ . "/../../resources/images/products/images.jpg");
            return (object)["status" => "success"];
        }
        return (object)["status" => "failed", "error" => "invalid request"];
    }

    public function update()
    {
        if (RequestHandler::isPostMethod()) {
            $id = $_POST["id"];
            $title = $_POST["title"];
            $description = $_POST["description"];
            $category = $_POST["category"];
            $categoryId = $this->getData("SELECT * FROM `category` WHERE `category` ='" . $category . "' ")[0]["category_id"];
            $this->updateData("UPDATE `product` SET `category_category_id`=?, `title`=?, `description`=? WHERE `product_id`=$id", "iss", array($categoryId, $title, $description));
            return (object)["status" => "success"];
        }
        return (object)["status" => "failed", "error" => "invalid request"];
    }

    public function delete()
    {
        if (RequestHandler::isPostMethod()) {
            $id = $_POST["id"];
            $this->deleteData("DELETE FROM `product` WHERE `product_id`=$id");
            return (object)["status" => "success"];
        }
        return (object)["status" => "failed", "error" => "invalid request"];
    }
}
