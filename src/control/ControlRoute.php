<?php
namespace control;
class ControlRoute
{
    private string $_url;

    public function __construct(string $url)
    {
        $this->_url = trim($url, '/');
    }

    public function route(): void
    {
        $basePath = dirname(__DIR__, 2);
        $page = "";
        $keyword = "";
        $description = "";
        $canonical = "";
        $title = "";

        // Liste des pages autorisées
        $routes_valides = ["", "accueil", "contact", "404"];
        if (!in_array($this->_url, $routes_valides)) {
            $this->_url = (string) "404";
        }


        switch ($this->_url) {
            case '':
                $keyword = "PepinPHP, framework PHP, accueil";
                $description = "Bienvenue sur PepinPHP, un framework PHP léger et modulaire. Découvrez comment démarrer rapidement.";
                $canonical = "/accueil";
                $title = "Accueil - PepinPHP";
                $page = '/src/view/navigation/accueil.php';
                break;
            case 'accueil':
                $keyword = "PepinPHP, framework PHP, accueil";
                $description = "Bienvenue sur PepinPHP, un framework PHP léger et modulaire. Découvrez comment démarrer rapidement.";
                $canonical = "/accueil";
                $title = "Accueil - PepinPHP";
                $page = '/src/view/navigation/accueil.php';
                break;
            case 'contact':
                $keyword = "contact, support, PepinPHP, aide";
                $description = "Page de contact de PepinPHP. Pour toute question ou support, contactez-nous.";
                $canonical = "/contact";
                $title = "Contact - PepinPHP";
                $page = '/src/view/navigation/contact.php';
                break;
            default:  // 404
                $keyword = "erreur 404, page non trouvée, PepinPHP";
                $description = "La page demandée n'existe pas ou a été déplacée.";
                $canonical = "/404";
                $title = "Erreur 404 - Page non trouvée - PepinPHP";
                $page = '/src/view/navigation/404.php';
                break;

        }

        require_once $basePath . '/src/view/template/header.php';
        require_once $basePath . '/src/view/template/navbar.php';
        require_once $basePath . $page;
        require_once $basePath . '/src/view/template/footer.php';
    }
}