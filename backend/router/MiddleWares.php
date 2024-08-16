<?php

require_once(__DIR__ . "/../model/security/CSRFPreventor.php");

final class MiddleWares
{
    public function security_layer_1()
    {
        // CSRF prevention
        $csrfPreventor = new CSRFPreventor();
        if ($csrfPreventor->validate_csrf_token()) {
            $csrfPreventor->csrf_token_set();
        } else {
            $csrfPreventor->csrf_token_set();
            return false;
        }
    }
}
