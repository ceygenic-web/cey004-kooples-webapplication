<?php

class SessionManager
{
    private $sessionVariable = "cey004_user";

    public function __construct()
    {
        $this->sessionStarter();
    }

    private function sessionStarter()
    {
        $sessionStatus = session_status();
        if ($sessionStatus === PHP_SESSION_NONE) {
            // Set session cookie parameters
            $expire = 60 * 60 * 24 * 14; // Expiration time in seconds (14 days)
            $path = '/'; // Cookie path
            $domain = ''; // Cookie domain (leave empty for current domain)
            $secure = true; // Set to true if using HTTPS
            $httponly = true; // Set to true to make the cookie accessible only through HTTP

            // Set the session cookie parameters
            session_set_cookie_params($expire, $path, $domain, $secure, $httponly);

            session_start();
            var_dump($_SESSION);
        }
    }

    public function updateSessionVariable(string $name)
    {
        $this->sessionVariable = $name;
        var_dump($_SESSION);
    }

    public function isLoggedIn()
    {
        return isset($_SESSION[$this->sessionVariable]);
    }

    public function login($userId)
    {
        $_SESSION[$this->sessionVariable] = $userId;
    }

    public function logout()
    {
        unset($_SESSION[$this->sessionVariable]);
    }

    public function getUserId()
    {
        if ($this->isLoggedIn()) {
            return $_SESSION[$this->sessionVariable];
        }
        return null;
    }
}
