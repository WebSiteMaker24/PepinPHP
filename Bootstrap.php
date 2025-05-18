<?php

// Bootstrap.php

use model\EnvLoader;
use control\ControlMain;
use middleware\Middleware;
use csrf\CSRFProtection;

class Bootstrap
{
    public function __construct()
    {
    }

    public function run(): void
    {
        // 🌐 Chargement des variables d'environnement
        $env = new EnvLoader(__DIR__ . "/.env");
        $env->load();

        // 🗄️ Récupération des infos DB (optionnel, à stocker si besoin)
        $db_host = $env->get('DB_HOST');
        $db_user = $env->get('DB_USER');
        $db_pass = $env->get('DB_PASS');
        $db_name = $env->get('DB_NAME');

        // 🛡️ Exécution du middleware statique
        Middleware::middleware();

        // 🔐  Protection CSRF
        $csrfProtection = new CSRFProtection();
        $csrfProtection->generateToken();

        // 👤 Module utilisateur - enregistrement des visites
        $visitControl = new \module\comptevisit\ControlVisit();
        $visitControl->enregistrerVisite();

        // 🚦 Récupération de l'URL demandée (routeur)
        $url = $_GET['url'] ?? 'accueil';

        // 🛣️ Appel du routeur pour gérer la requête
        $router = new \control\ControlRoute($url);
        $router->route();
    }
}