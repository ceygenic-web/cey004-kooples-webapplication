<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for watchlist realted tasks
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class Watchlist extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }

       // watchlist data adding process
       protected function add()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "new item added to watchlist 🔖"); // json response
       }

       // get the watchlist
       protected function get()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "get the list of watchlist items"); // json response
       }

       // remove item from watchlist 
       protected function remove()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "watchlist item removed!"); // json response
       }
}
