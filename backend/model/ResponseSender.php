<?php
require_once("middleware/middleware.php");

class ResponseSender
{
    public static function sendJson($responseObject, $callMiddleware = false)
    {
        header("Content-Type: application/json");

        echo json_encode($responseObject);
        if ($callMiddleware) {
            $middleware =  new Middleware(1);
            $middleware->execute();
        }
        exit();
    }

    public static function sendText($responseText)
    {
        echo $responseText;
        exit();
    }
}
