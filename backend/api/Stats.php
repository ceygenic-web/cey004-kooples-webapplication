<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for statistical data related proceses.
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class Stats extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }

       // get users stats
       protected function users()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "users data 📈"); // json response
       }

       // get orders stats
       protected function orders()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "orders data 📈"); // json response
       }

       // get total summery stats
       protected function summery()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "total statistical data 📈"); // json response
       }
}
