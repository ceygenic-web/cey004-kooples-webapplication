<?php

require_once(__DIR__ . "/../SessionManager.php");

class CSRFPreventor
{
    private SessionManager $sessionManager;

    public function __construct()
    {
        $this->sessionManager = new SessionManager();
    }

    public function genereate_token()
    {
        return  bin2hex(random_bytes(32));
    }

    function validate_csrf_token($token)
    {
        // Retrieve CSRF token from session
        $stored_token = $_SESSION['csrf_token'] ?? '';
        // Retrieve CSRF token from cookie
        $cookie_token = $_COOKIE['csrf_token'] ?? '';
        // Validate token against both session and cookie values
        return hash_equals($stored_token, $token) && hash_equals($cookie_token, $token);
    }

    public function csrf_token_set()
    {
        $_SESSION["csrf_token"] = $this->genereate_token();
        setcookie('csrf_token', $_SESSION["csrf_token"], time() + 3600, '/', '', false, true);
    }
}
