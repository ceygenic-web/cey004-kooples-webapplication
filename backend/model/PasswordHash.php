<?php

class PasswordHash
{
    // Encryption method using SHA-512

    private static string $salt = "1h23j4h5ythf7d6r";

    public static function hash($password)
    {
        $hash = hash('sha256', $password . self::$salt);
        return $hash;
    }

    // Verifier using SHA-512
    public static function isValid($password, $hash)
    {
        $hashedfromdb = hash('sha256', $password . self::$salt);
        return hash_equals($hashedfromdb, $hash);
    }
}
