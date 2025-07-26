<?php
namespace control;
class ControlRoute
{
    private string $_url;
    private string $_navigation = "/src/view/navigation/";
    private string $_template = "/src/view/template/";
    private string $_jsonld = "/../json-ld/";
    private string $_extension = ".php";
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
        $routes_valides = ["", "accueil", "service", "contact", "404"];
        if (!in_array($this->_url, $routes_valides)) {
            $this->_url = (string) "404";
        }

        switch ($this->_url) {
            case "":
                $url = $this->_url;
                $robot = "index, follow";
                $description = "";
                $canonical = URL_DOMAINE . "/";
                $title = COMPANY_NAME . " | " . COMPANY_SLOGAN;
                $jsonld = $this->_jsonld . "jsonld-navigation" . $this->_extension;
                $page = $this->_navigation . "accueil" . $this->_extension;
                break;

            /* LA NAVIGATION */
            case "contact":
                $url = $this->_url;
                $robot = "index, follow";
                $description = "";
                $title = "Contactez nous | " . COMPANY_NAME;
                $canonical = URL_DOMAINE . "/contact";
                $jsonld = $this->_jsonld . "jsonld-navigation" . $this->_extension;
                $page = $this->_navigation . "contact" . $this->_extension;
                break;
            case "service":
                $url = $this->_url;
                $robot = "index, follow";
                $description = "";
                $title = "Nos services | " . COMPANY_NAME;
                $canonical = URL_DOMAINE . "/service";
                $jsonld = $this->_jsonld . "jsonld-navigation" . $this->_extension;
                $page = $this->_navigation . "service" . $this->_extension;
                break;

            case "404":
                $robot = "noindex, unfollow";
                $title = "Erreur 404 | " . COMPANY_NAME;
                $canonical = URL_DOMAINE . "/404";
                $page = $this->_navigation . "404" . $this->_extension;
                break;

            default:
                $url = $this->_url;
                $robot = "index, follow";
                $description = "";
                $title = COMPANY_NAME . " | " . COMPANY_SLOGAN;
                $canonical = URL_DOMAINE . "/";
                $jsonld = $this->_jsonld . "jsonld-navigation" . $this->_extension;
                $page = $this->_navigation . "accueil" . $this->_extension;
                break;
        }

        // Template public
        require_once $basePath . $this->_template . 'header' . $this->_extension;
        require_once $basePath . $this->_template . 'navbar' . $this->_extension;
        require_once $basePath . $page;
        require_once $basePath . $this->_template . 'footer' . $this->_extension;

    }

    private function ipAutorisee(): bool
    {
        $ips_autorisees = explode(',', getenv('ADMIN_IP'));

        $ip_client = $_SERVER['REMOTE_ADDR'];
        return in_array($ip_client, $ips_autorisees);
    }
}