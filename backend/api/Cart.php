<?php

/**
 * @author : Janith Nirmal
 * @description : This API handles requests for cart realted tasks
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class Cart extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }

       // cart data adding process
       protected function add()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "new item added to the cart 🛒"); // json response
       }

       // get the cart data list
       protected function get()
       {
              if (!self::isGetMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "get the list of cart items"); // json response
       }

       // udpate the cart data
       protected function update()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "cart items are updated!"); // json response
       }

       // remove item from cart 
       protected function remove()
       {
              if (!self::isPostMethod()) {
                     return self::response(2, INVALID_REQUEST_METHOD);
              }

              return self::response(1, "cart item removed!"); // json response
       }
}
