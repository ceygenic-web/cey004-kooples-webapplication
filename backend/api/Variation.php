<?php

/**
 * @author : Janith Nirmal
 * @description : this is the test API for system updates.
 */

// import statements
require_once __DIR__ . '/../router/Api.php';
require_once __DIR__ . '/../model/DatabaseBackupHandler.php';
require_once __DIR__ . '/../api/Admin.php';


class Variation extends Api
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
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);

        $variation = $_POST["variation"] ?? null;

        $id = rand(111111, 999999);


        // validation
        $errors = $this->validateData([

            "text_255" => ["variation_name" => $variation],

        ]);
        if (is_array($errors))
            return self::response(3, $errors);

        $duplicates = $this->dbCall("SELECT `variation_id`, `name` FROM `variation` WHERE `name` = ?", "s", [$variation]);
        if (count($duplicates) && $duplicates[0]["name"] === $variation)
            return self::response(2, "Variation Name is already in use!");

        // insert data to database
        $this->crudOperator->insert("variation", [
            "variation_id" => $id,
            "name" => $variation,
        ]);

        return self::response(1, "Variation Added Successfully!");
    }

    protected function get()
    {
        if (!self::isGetMethod())
            return self::response(2, INVALID_REQUEST_METHOD);

        //get the id
        $id = $_GET["id"] ?? null;

        if ($id) {
            $dbResults = $this->crudOperator->select("variation", ["variation_id" => $id]);
            if (count($dbResults)) {
                return self::response(1, $dbResults);
            }
        }


        $dbResults = $this->crudOperator->select("variation");
        if (count($dbResults)) {
            return self::response(1, $dbResults);
        }
        return self::response(2, "no result found");
    }
    protected function update()
    {
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);

        if (self::postMethodHasError("variation", "id"))
            return self::response(2, "INVALID_REQUEST_PARAMETERS");

        $variation = $_POST["variation"] ?? null;
        $id = $_POST["id"] ?? null;

        // validation
        $errors = $this->validateData([

            "text_255" => ["variation_name" => $variation],
            "id_int" => ["id" => $id],

        ]);
        if (is_array($errors))
            return self::response(3, $errors);

        $duplicates = $this->dbCall("SELECT `variation_id`, `name` FROM `variation` WHERE `name` = ?", "s", [$variation]);
        if (count($duplicates) && $duplicates[0]["name"] === $variation)
            return self::response(2, "Variation Name is already in use!");

        //chrck is there any variation with the given id
        $duplicates = $this->dbCall("SELECT `variation_id`, `name` FROM `variation` WHERE `variation_id` = ?", "s", [$id]);
        if (!count($duplicates))
            return self::response(2, "Variation Id Not Found!");

        // insert data to database
        $this->crudOperator->update("variation", [
            "name" => $variation,
        ], ["variation_id" => $id]);

        return self::response(1, "Variation Updated Successfully!");
    }

    protected function delete()
    {
        //we will lave this into second sage
    }
    protected function optionAdd()
    {
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);

        if (self::postMethodHasError("variation_option", "variation_id"))
            return self::response(2, "INVALID_REQUEST_PARAMETERS");

        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }
        $variation_id = $_POST["variation_id"] ?? null;
        $variation_option = $_POST["variation_option"] ?? null;

        //validate the data
        $errors = $this->validateData([
            "id_int" => ["variation_id" => $variation_id],
            "text_255" => ["variation_option" => $variation_option],
        ]);
        if (is_array($errors))
            return self::response(3, $errors);

        //add the variation option
        $this->crudOperator->insert("variation_option", [
            "variation_variation_id" => $variation_id,
            "value" => $variation_option,
        ]);

        //return success massage
        return self::response(1, "Variation Option Added Successfully!");
    }
    public function optionGet()
    {
        if (!self::isGetMethod())
            return self::response(2, INVALID_REQUEST_METHOD);

        //admin verification
        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }

        //get the id
        $id = $_GET["id"] ?? null;

        if ($id) {
            $dbResults = $this->crudOperator->select("variation_option", ["variation_option_id" => $id]);
            if (count($dbResults)) {
                return self::response(1, $dbResults);
            } else {
                return self::response(2, "no result found");
            }
        }
        //get all the data if id is null
        $dbResults = $this->crudOperator->select("variation_option", []);
        if (count($dbResults)) {
            return self::response(1, $dbResults);
        }
    }
    public function optionUpdate()
    {
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);

        if (self::postMethodHasError("variation_option", "variation_id", "id"))
            return self::response(2, "INVALID_REQUEST_PARAMETERS");

        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }
        $variation_id = $_POST["variation_id"] ?? null;
        $variation_option = $_POST["variation_option"] ?? null;
        $id = $_POST["id"] ?? null;

        //validate the data
        $errors = $this->validateData([
            "id_int" => ["variation_id" => $variation_id],
            "text_255" => ["variation_option" => $variation_option],
            "id_int" => ["id" => $id],
        ]);
        if (is_array($errors))
            return self::response(3, $errors);

        //check id is there
        $duplicates = $this->dbCall("SELECT `variation_option_id`, `value` FROM `variation_option` WHERE `variation_option_id` = ?", "s", [$id]);
        if (!count($duplicates))
            return self::response(2, "Variation Option Id Not Found!");

        //check variation id is there in variation table
        $duplicates = $this->dbCall("SELECT `variation_id`, `name` FROM `variation` WHERE `variation_id` = ?", "s", [$variation_id]);
        if (!count($duplicates))
            return self::response(2, "Variation Id Not Found!");

        //add the variation option
        $this->crudOperator->update("variation_option", [
            "value" => $variation_option,
            "variation_variation_id" => $variation_id,
        ], ["variation_option_id" => $id]);

        //return success massage
        return self::response(1, "Variation Option Updated Successfully!");
    }
    public function optionDelete()
    {
        //just created simple thing we will update later
        
        if (!self::isPostMethod())
            return self::response(2, INVALID_REQUEST_METHOD);

        if (self::postMethodHasError("variation_option", "id"))
            return self::response(2, "INVALID_REQUEST_PARAMETERS");

        if (!$this->admin->is_logged()) {
            return self::response(2, INVALID_ADMIN_ACCESS);
        }
        $id = $_POST["id"] ?? null;

        //validate the data
        $errors = $this->validateData([
            "id_int" => ["id" => $id],
        ]);
        if (is_array($errors))
            return self::response(3, $errors);

        //check id is there
        $duplicates = $this->dbCall("SELECT `variation_option_id`, `value` FROM `variation_option` WHERE `variation_option_id` = ?", "s", [$id]);
        if (!count($duplicates))
            return self::response(2, "Variation Option Id Not Found!");

        //delete the variation option
        $this->crudOperator->delete("variation_option", ["variation_option_id" => $id]);

        //return success massage
        return self::response(1, "Variation Option Deleted Successfully!");
    }
}
