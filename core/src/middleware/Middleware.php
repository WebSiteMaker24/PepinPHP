<?php

namespace middleware;

class Middleware
{
    public static function middleware()
    {
        self::activeSession();
        self::antiVolSession();
    }

    // Nettoie les données d'entrée (trim + strip_tags)
    public static function sanitize($data)
    {
        if (is_array($data)) {
            return array_map([self::class, 'sanitize'], $data);
        }

        // Supprime les balises HTML mais garde les caractères spéciaux tels quels
        return trim($data);
    }

    // Démarrage sécurisé de la session
    public static function activeSession()
    {
        if (session_status() == PHP_SESSION_NONE) {
            ini_set('session.use_strict_mode', 1);
            ini_set('session.cookie_httponly', 1);
            ini_set('session.cookie_secure', isset($_SERVER['HTTPS']));
            ini_set('session.use_only_cookies', 1);
            session_start();
        }
    }

    // Nettoyage des données à l'affichage : \middleware\Middleware::e($userInput)
    public static function e($value) {
        return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
    }

    // Protection contre le vol de session
    public static function antiVolSession($force = false)
    {
        $sessionTimeout = 3600; // 1h
        $userIP = $_SERVER['REMOTE_ADDR'] ?? '';
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';

        if (isset($_SESSION['initiated']) && (time() - $_SESSION['initiated'] > $sessionTimeout)) {
            session_destroy();
            session_start();
        }

        if (!isset($_SESSION['initiated']) || $force) {
            session_regenerate_id(true);
            $_SESSION['initiated'] = time();
            $_SESSION['user_ip'] = $userIP;
            $_SESSION['user_agent'] = $userAgent;
        } else {
            if ($_SESSION['user_ip'] !== $userIP || $_SESSION['user_agent'] !== $userAgent) {
                session_destroy();
                session_start();
            }
        }
    }
}




