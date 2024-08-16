<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for product purchasing and ordering processes
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class Order extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }

       // product Purchasing process
       protected function purchase()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "purchased! 💵"); // json response
       }

       // get orders data
       protected function get()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "order list"); // json response
       }
}
