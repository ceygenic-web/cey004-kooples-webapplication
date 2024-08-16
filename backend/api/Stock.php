<?php

/**
 * @author : Janith Nirmal
 * @description : this is the test API for system updates.
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/DatabaseBackupHandler.php';
require_once __DIR__ . '/../api/Admin.php';


class Stock extends Api
{
    private Admin $admin;

    public function __construct($apiPath)
    {
        //pares apiPath parent class constructor
        parent::__construct($apiPath);
        $this->admin = new Admin([], false);
        $this->init($this);
    }


    //data method
    protected function process()
    {
        // $operator = new DatabaseBackup($this->databaseDriver->connection, DB_DATABASE);
        // $operator->createBackup();
        $dbResults = $this->crudOperator->select("user", ["user_id" => 20]);
        if (count($dbResults)) {
            return self::response(1, $dbResults);
        }
        return self::response(2, "no result found");
    }

    protected function add()
    {
        //
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);
        //check user is admin
        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }
        //catch the data
        $qty = $_POST["qty"] ?? null;
        $price = $_POST["price"] ?? null;
        $productId = $_POST["product_id"] ?? null;
        $variationOptionId = $_POST["variation_option_id"] ?? null;
        $productItemId = rand(111111, 999999);
        $sku = rand(11111111, 99999999);

        //validation
        $errors = $this->validateData([
            "id_int" => ["product_id" => $productId, "variation_option_id" => $variationOptionId],

        ]);
        if (is_array($errors))
            return self::response(3, $errors);
        //check product id is already exist
        $duplicates = $this->dbCall("SELECT `product_id`, `product_title` FROM `product` WHERE `product_id` = $productId");
        if (!count($duplicates))
            return self::response(2, "Product ID is not exist!");

        //check variation option id is already exist
        $duplicates = $this->dbCall("SELECT `variation_option_id`, `value` FROM `variation_option` WHERE `variation_option_id` = $variationOptionId");
        if (!count($duplicates))
            return self::response(2, "Variation Option ID is not exist!");

        //add data into product item tabel
        $this->crudOperator->insert('product_item', [
            'product_item_id' => $productItemId,
            'qty_in_stock' => $qty,
            'price' => $price,
            'product_product_id' => $productId,
            'SKU' => $sku,


        ]);

        //add data into product_configuration tabel
        $this->crudOperator->insert('product_configuration', [
            'product_item_product_item_id' => $productItemId,
            'variation_option_variation_option_id' => $variationOptionId,
        ]);

        //send sucess massege
        return self::response(1, "Product Item Added Successfully!");
    }
    public function get()
    {
        if (!self::isGetMethod())
            return self::response(2, INVALID_REQUEST_METHOD);
        //check user is admin
        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }
        //get the id
        $id = $_GET["id"] ?? null;
        //get the data if id is not null
        if ($id) {
            $dbResults = $this->crudOperator->select("product_item", ["product_item_id" => $id]);
            if (count($dbResults)) {
                return self::response(1, $dbResults);
            } else {
                return self::response(2, "no result found");
            }
        }
        //get all the data if id is null
        $dbResults = $this->crudOperator->select("product_item", []);
        if (count($dbResults)) {
            return self::response(1, $dbResults);
        }
    }
    public function update()
    {
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);
        //check user is admin
        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }
        //catch the data
        $qty = $_POST["qty"] ?? null;
        $price = $_POST["price"] ?? null;
        $productId = $_POST["product_id"] ?? null;
        $variationOptionId = $_POST["variation_option_id"] ?? null;
        $productItemId = $_POST["product_item_id"] ?? null;


        //validation
        $errors = $this->validateData([
            "id_int" => ["product_id" => $productId, "variation_option_id" => $variationOptionId, "product_item_id" => $productItemId],

        ]);
        if (is_array($errors))
            return self::response(3, $errors);
        //check product id is already exist
        $duplicates = $this->dbCall("SELECT `product_id`, `product_title` FROM `product` WHERE `product_id` = $productId");
        if (!count($duplicates))
            return self::response(2, "Product ID is not exist!");

        //check variation option id is already exist
        $duplicates = $this->dbCall("SELECT `variation_option_id`, `value` FROM `variation_option` WHERE `variation_option_id` = $variationOptionId");
        if (!count($duplicates))
            return self::response(2, "Variation Option ID is not exist!");
        //check product item id is already exist
        $duplicates = $this->dbCall("SELECT `product_item_id`, `qty_in_stock` FROM `product_item` WHERE `product_item_id` = $productItemId");
        if (!count($duplicates))
            return self::response(2, "Product Item ID is not exist!");


        //update data into product item tabel
        $this->crudOperator->update('product_item', [
            'qty_in_stock' => $qty,
            'price' => $price,
            'product_product_id' => $productId,



        ], ['product_item_id' => $productItemId]);

        //update data into product_configuration tabel
        $this->crudOperator->update('product_configuration', [
            'variation_option_variation_option_id' => $variationOptionId,
        ], ['product_item_product_item_id' => $productItemId]);

        //send sucess massege
        return self::response(1, "Product Item Updated Successfully!");
    }

    public function delete()
    {
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);
        //check user is admin
        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }
        //catch the data
        $productItemId = $_POST["product_item_id"] ?? null;
        //validation
        $errors = $this->validateData([
            "id_int" => ["product_item_id" => $productItemId],

        ]);
        if (is_array($errors))
            return self::response(3, $errors);
        //check product item id is already exist
        $duplicates = $this->dbCall("SELECT `product_item_id`, `qty_in_stock` FROM `product_item` WHERE `product_item_id` = $productItemId");
        if (!count($duplicates))
            return self::response(2, "Product Item ID is not exist!");

        //delete data from product item tabel
        $this->crudOperator->delete('product_item', ['product_item_id' => $productItemId]);

        //delete data from product_configuration tabel
        $this->crudOperator->delete('product_configuration', ['product_item_product_item_id' => $productItemId]);

        //send sucess massege
        return self::response(1, "Product Item Deleted Successfully!");
    }
}
