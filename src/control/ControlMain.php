<?php

namespace control;

class ControlMain
{
    public function __construct()
    {
    }

    // 🧡 Gestion des messages flash
    public static function message_flash(): mixed
    {
        if (isset($_SESSION["message"])) {
            $message = $_SESSION["message"];
            unset($_SESSION["message"]);
            return $message;
        }
        return null;
    }

}