<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for products related processes
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../api/Admin.php';
require_once __DIR__ . '/../model/FileManger.php';

class Product extends Api
{

       private Admin $admin;

       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->admin = new Admin([], false);
              $this->init($this);
       }

       // add products data process
       protected function add()
       {
              if (!self::isPostMethod())
                     return self::response(2, INVALID_REQUEST_METHOD);

              if (!$this->admin->is_logged()) {
                     return self::response(2, INVALID_ADMIN_ACCESS);
              }


              $id = random_int(111111, 999999);
              $title = $_POST["title"] ?? null;
              $description = $_POST["description"] ?? null;
              $promotion = $_POST["promotion"] ?? null;
              $category = $_POST["category"] ?? null;
              $images = $_FILES ?? null;
              $addedTime = date("Y-m-d H:i:s");

              // validation
              $errors = $this->validateData([
                     "text_255" => ["title" => $title, "description" => $description],
                     "id_int" => ["category" => $category, "promotion" => $promotion]
              ]);
              if (is_array($errors))
                     return self::response(3, $errors);

              $duplicates = $this->dbCall("SELECT `product_id`, `product_title` FROM `product` WHERE `product_id` = $id OR `product_title` = ?", "s", [$title]);
              if (count($duplicates) && $duplicates[0]["product_title"] === $title)
                     return self::response(2, "Product Title is already in use!");
              else if (count($duplicates) && $duplicates[0]["product_id"] === $id)
                     return self::response(2, "Something went Wrong, Please Try Again!");


              // insert data to database
              $this->crudOperator->insert("product", [
                     "product_id" => $id,
                     "product_title" => $title,
                     "description" => $description,
                     "promotion_promotion_id" => $promotion,
                     "category_category_id" => $category,
                     "product_status_product_status_id" => 1,
                     "product_added_datetime" => $addedTime
              ]);
              //image uploading logic
              if ($images) {

                     foreach ($images as $key => $value) {
                            //check if product has maximum five images
                            $imageCount = $this->dbCall("SELECT COUNT(`product_product_id`) as `count` FROM `product_images` WHERE `product_product_id` = ?", "i", [$id]);
                            if ($imageCount[0]["count"] >= 5) {
                                   return self::response(2, "Product can have maximum 5 images");
                            }
                            $imageId = rand(111111, 999999);

                            $fileManger = new FileManger();
                            $uploadFile = $fileManger->writeFile('./resources/images/products/', $imageId, $value);
                            if ($uploadFile) {
                                   $this->crudOperator->insert("product_images", [
                                          "image_name" => $imageId,
                                          "product_product_id" => $id,

                                   ]);
                            } else {
                                   return self::response(2, "Image upload failed");
                            }
                     }
              }



              return self::response(1, "new product added"); // json response
       }

       // get products data process
       protected function get()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $id = $_GET["id"] ?? null; // product id

              // validation
              $errors = $this->validateData(["id_int" => ["id" => $id]]);
              if (is_array($errors))
                     return self::response(2, $errors);


              // create search query
              $query = "SELECT * FROM `product`";

              if ($id) {
                     $query .= " WHERE `product_id` = '$id' ";
              }

              $results = $this->dbCall($query);
              return self::response(1, $results); // json response
       }

       // update product data process
       protected function update()
       {
              if (!$this->admin->is_logged()) {
                     return self::response(2, INVALID_ADMIN_ACCESS);
              }

              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }
              //catch post data
              $id = $_POST["id"] ?? null;
              $title = $_POST["title"] ?? null;
              $description = $_POST["description"] ?? null;
              $promotion = $_POST["promotion"] ?? null;
              $category = $_POST["category"] ?? null;
              $status = $_POST["status"] ?? null;
              $images = $_FILES ?? null;

              //create associative array with all parameters without id key will be coloumn name
              $updateData = [
                     "product_title" => $title,
                     "description" => $description,
                     "promotion_promotion_id" => $promotion,
                     "category_category_id" => $category,
                     "product_status_product_status_id" => $status
              ];



              $this->crudOperator->update("product", $updateData, ["product_id" => $id]);

              //handle images
              if ($images) {
                     foreach ($images as $key => $value) {
                            //check if product has maximum five images
                            $imageCount = $this->dbCall("SELECT COUNT(`product_product_id`) as `count` FROM `product_images` WHERE `product_product_id` = ?", "i", [$id]);
                            if ($imageCount[0]["count"] >= 5) {
                                   return self::response(2, "Product can have maximum 5 images");
                            }
                            $imageId = rand(111111, 999999);

                            $fileManger = new FileManger();
                            $uploadFile = $fileManger->writeFile('./resources/images/products/', $imageId, $value);
                            if ($uploadFile) {
                                   $this->crudOperator->insert("product_images", [
                                          "image_name" => $imageId,
                                          "product_product_id" => $id,

                                   ]);
                            } else {
                                   return self::response(2, "Image upload failed");
                            }
                     }
              }
              
              return self::response(1, "product updated"); // json response
       }

       // product remove process
       protected function delete()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              // access check
              if (!$this->admin->is_logged())
                     return self::response(2, INVALID_ADMIN_ACCESS);


              $id = $_POST["id"] ?? null; // product id

              // validation
              $errors = $this->validateData(["id_int" => ["id" => $id]]);
              if (is_array($errors))
                     return self::response(2, $errors);

              $this->dbCall("DELETE FROM `product` WHERE `product_id` = ? ", "i", [$id]);

              return self::response(1, "product deleted!"); // json response
       }
}
