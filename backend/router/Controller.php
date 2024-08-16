<?php

//packages
require_once(__DIR__ . "/../model/DatabaseDriver.php");
require_once(__DIR__ . "/../model/SessionManager.php");
require_once(__DIR__ . "/../model/ResponseSender.php");
require_once(__DIR__ . "/../model/RequestHandler.php");

/**
 * @author : Madusha Pravinda
 */
class Controller
{
       use ResponseSender; // Trait for sending HTTP responses
       use RequestHandler; // Trait for handling HTTP requests

       protected $databaseDriver;
       protected $sessionManager;

       public function __construct()
       {
              $this->databaseDriver = new DatabaseDriver();
              $this->sessionManager = new SessionManager();
       }

       /**
        * set the response type to text
        */
       public static function setResponseToText()
       {
              global $IS_RESPONSE_TEXT;
              $IS_RESPONSE_TEXT = true;
       }
}
