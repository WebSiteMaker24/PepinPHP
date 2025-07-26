<?php
// Bootstrap.php

use envloader\EnvLoader;
use control\ControlForm;
use middleware\Middleware;
use csrf\CSRFProtection;
class Bootstrap
{
    public function run(): void
    {
        date_default_timezone_set('Europe/Paris');

        // 🌐 Chargement des variables d'environnement
        $env = new EnvLoader(__DIR__ . "/.env");
        $env->load();

        // 🛡️ Exécution du middleware statique
        Middleware::middleware();

        // 🔐  Protection CSRF
        $csrfProtection = new CSRFProtection();
        $csrfProtection->generateToken();

        // 📋 Gère les formulaires avec la sécurité crsf
        $controlForm = new ControlForm($csrfProtection);
        $controlForm->handleRequest();

        // 🚦 Récupération de l'URL demandée (routeur)
        $url = $_GET['url'] ?? 'accueil';

        // 🛣️ Appel du routeur pour gérer la requête
        $router = new \control\ControlRoute($url);
        $router->route();
    }
}