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
                case 'get-related':
                    return [$this->getRelated(($_SERVER["REQUEST_METHOD"] === "GET") ? $_GET : []), false];
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

    // load products details
    public function view($params)
    {
        $query = "SELECT * FROM `product` 
                    INNER JOIN `category` ON `product`.`category_category_id` = `category`.`category_id` 
                    INNER JOIN `sub_categories` ON `product`.`sub_categories_sub_categories_id` = `sub_categories`.`sub_categories_id` ";
        if (isset($params["id"]) && !empty($params["id"])) {
            $query .= " WHERE `product`.`product_id` = '" . $params["id"] . "' ";
        } else if ($params) {
            $query .= (isset($params["search"])) ? " WHERE (`product`.`title` LIKE '%" . $params["search"] . "%' OR `product`.`description` LIKE '%" . $params["search"] . "%' OR `category`.`category` LIKE '%" . $params["search"] . "%') " : " ";
            $query .= (isset($params["product"]) && !isset($params["search"])) ? " WHERE `product`.`product_id` = '" . $params["product"] . "' " : " ";
            $query .= (isset($params["category"])  && !isset($params["search"])) ? " WHERE `category`.`category` = '" . $params["category"] . "' " : " ";
            $query .= (isset($params["category"])  && isset($params["search"])) ? " AND `category`.`category` = '" . $params["category"] . "' " : " ";
            $query .= (isset($params["limit"])) ? " LIMIT " . $params["limit"] . "  " : " ";
        }
        $results = $this->getData($query);

        // get images
        foreach ($results as $key => $value) {
            $productId = $value['product_id'];
            $results[$key]["images"] = $this->getData("SELECT * FROM `product_images` WHERE `product_product_id` = '$productId' ");
        }
        return (object)["status" => "success", "results" => $results];
    }

    public function getRelated($params)
    {
        $parameters["search"] = ($params["search"]) ?? null;
        $parameters["limit"] = 4;
        return $this->view($parameters);
    }


    // add products to the server
    public  function add()
    {
        if (!RequestHandler::isPostMethod()) {
            return (object)["status" => "failed", "error" => "invalid request"];
        }

        $title = $_POST["title"];
        $description = $_POST["description"];
        $category = $_POST["category"];
        $price = $_POST["price"];
        $subCategories = $_POST["sub_category"];
        $other_data = $_POST["other_data"];
        $images = $_FILES;


        if (
            (!isset($title) || empty($title)) ||
            (!isset($description) || empty($description)) ||
            (!isset($category) || empty($category)) ||
            (!isset($subCategories) || empty($subCategories)) ||
            (!isset($price) || empty($price)) ||
            (!isset($other_data) || empty($other_data))
        ) {
            return (object)["status" => "failed", "error" => "Empty Input field!"];
        }

        if (!floatval($price)) {
            return (object)["status" => "failed", "error" => "invalid price"];
        }

        $categoryId = $this->getData("SELECT * FROM `category` WHERE `category` ='" .  $category . "' ")[0]["category_id"];
        $subCategoryId = $this->getData("SELECT * FROM `sub_categories` WHERE `sub_category` ='" .  $subCategories . "' ")[0]["sub_categories_id"];
        $id = mt_rand(000000, 999999);
        $this->updateData("INSERT INTO `product` 
                                    (`product_id`,`category_category_id`, `title`, `description`, `price`, `sub_categories_sub_categories_id`, `other_data`) 
                                    VALUES (?,?,?,?,?,?,?)", "sisssss", array($id, $categoryId, $title, $description, $price, $subCategoryId, $other_data));
        foreach ($images as $key => $value) {
            $fileName = "resources/images/products/$id-image-$key.jpeg";
            move_uploaded_file($value["tmp_name"], __DIR__ . "/../../$fileName");
            $this->updateData("INSERT INTO `product_images` (`filename`, `product_product_id`) VALUES ('$fileName', '$id') ");
        }
        return (object)["status" => "success"];
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
            $id = ($_POST["id"]) ?? null;
            $images = $this->getData("SELECT * FROM `product_images` WHERE `product_product_id`='$id' ");
            if (count($images) === 0) {
                return (object)["status" => "failed", "error" => "Image Not Found!"];
            }

            foreach ($images as $value) {
                if (unlink($value["filename"])) {
                    $imageId = $value['product_images_id'];
                    $this->updateData("DELETE FROM `product_images` WHERE `product_id`='$imageId'");
                };
            }

            $this->updateData("DELETE FROM `product` WHERE `product_id`='$id'");
            return (object)["status" => "success"];
        }
        return (object)["status" => "failed", "error" => "invalid request"];
    }
}
