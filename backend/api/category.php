<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for Category related processes
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class Category extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }

       // add categories data process
       protected function add()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $category = $_POST["category"] ?? null;
              $subCategory = $_POST["subCategory"] ?? null;

              if (!$category && !$subCategory)
                     return self::response(2, "Invalid Parameters");

              if ($category) {
                     $categoryId = $this->dbCall("SELECT * FROM `category` WHERE `category` = ? ", "s", [$category]);
                     if (count($categoryId) !== 0)
                            return self::response(2, "Category Already Exists");

                     $this->dbCall("INSERT INTO `category` (`category`) VALUES (?) ", "s", [$category]);
                     return self::response(1, "new category added"); // json response
              } else if ($subCategory) {
                     $subCategoryId = $this->dbCall("SELECT * FROM `sub_category` WHERE `sub_category` = ? ", "s", [$subCategory]);
                     if (count($subCategoryId) !== 0)
                            return self::response(2, "Sub Category Already Exists");

                     $this->dbCall("INSERT INTO `sub_category` (`sub_category`) VALUES (?) ", "s", [$subCategory]);
                     return self::response(1, "new sub category added"); // json response
              }
       }

       // get categories data process
       protected function get()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $id = $_GET["id"] ?? null; // category id
              $type = $_GET["type"] ?? null; // type

              // validation
              if (!$type)
                     return self::response(2, "invalid Parameter");

              $categoryFieldName = "";
              if ($type == "main")
                     $categoryFieldName = "category";
              else if ($type == "sub")
                     $categoryFieldName = "sub_category";
              else
                     return self::response(2, "invalid type");

              // create search query
              $query = "SELECT * FROM `$categoryFieldName`";

              if ($id) {
                     $query .= " WHERE `$categoryFieldName" . "_id` = '$id' ";
              }

              $results = $this->dbCall($query);
              return self::response(1, $results); // json response
       }

       // update category data process
       protected function update()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $id = $_POST["id"] ?? null;
              $category = $_POST["category"] ?? null;
              $type = $_POST["type"] ?? null;

              if (!$id || !$category || !$type) {
                     return self::response(2, "Invalid Parameters");
              }

              if ($type === "main") {
                     $this->dbCall("UPDATE `category` SET `category` = ? WHERE `category_id` = ? ", "si", [$category, $id]);
              } else if ($type === "sub") {
                     $this->dbCall("UPDATE `sub_category` SET `sub_category` = ? WHERE `sub_category_id` = ? ", "si", [$category, $id]);
              } else {
                     return self::response(2, "Invalid Category Type");
              }

              return self::response(1, "category updated"); // json response
       }

       // category remove process
       protected function delete()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              $id = $_POST["id"] ?? null;
              $type = $_POST["type"] ?? null;

              if (!$id || !$type) {
                     return self::response(2, "Invalid Parameters");
              }

              if ($type == "sub")
                     $this->dbCall("DELETE FROM `sub_category` WHERE `sub_category_id`=? ", "i", [$id]);
              else if ($type == "main")
                     $this->dbCall("DELETE FROM `category` WHERE `category_id`=? ", "i", [$id]);
              else
                     return self::response(1, "Invalid type"); // json response


              return self::response(1, "category deleted!"); // json response
       }
}
