<?php
require_once("ResponseSender.php");

class CustomErrors
{
    public static function _404()
    {
        ResponseSender::sendJson((object) [
            "status" => "failed",
            "error" => "404 Not found"
        ]);
    }
}
