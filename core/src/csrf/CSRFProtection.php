<?php

namespace csrf;

class CSRFProtection
{

    public static function generateToken(): string
    {
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }

        return $_SESSION['csrf_token'];
    }


    public static function includeToken(): void
    {
        $token = self::generateToken();

        echo '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token) . '">';
    }



    public function validateToken($token)
    {
        if (isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token)) {
            return true;
        }
        return false;
    }
}
