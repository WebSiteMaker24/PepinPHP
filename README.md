PepinPHP version 3
PepinPHP est un framework PHP léger, modulaire, et simple à utiliser, basé sur le modèle HMVC (Hierarchical Model View Controller).
Il facilite la gestion du routage, l'organisation des vues et modules, et permet une extension facile de vos projets web.

Table des matières
Présentation

Structure du projet

Installation

Configuration

Utilisation

Routage

Contribution

Contact

Licence

Présentation
PepinPHP est conçu pour être minimaliste et efficace, idéal pour des projets PHP qui veulent garder un contrôle simple sur l'architecture HMVC.
Il inclut un système de routage via paramètres URL, un découpage clair des templates, et supporte l'envoi d'emails via PHPMailer.

Structure du projet
La racine du projet contient notamment ces fichiers et dossiers :

/Autoload.php
/Bootstrap.php
/url.php
/sendmail.php
/phpmailer/
/public_html/
/src/
/.env
/README.md
/public_html/public/ : dossier public accessible via le serveur web (CSS, JS, images, etc.)

/src/ : code source PHP organisé selon l'architecture HMVC, séparant les modules indépendants (ex : gestion utilisateurs, compteur de visites) du noyau MVC principal (contrôleurs, modèles, vues).
Chaque module contient sa propre logique métier (contrôleur et modèle) pour une meilleure modularité.

/phpmailer/ : librairie PHPMailer pour l'envoi d'emails

url.php : définitions des constantes d'URL utilisées pour le routage

sendmail.php : gestion de l'envoi d'emails (configuration SMTP nécessaire)

.env : fichier de configuration des variables d'environnement (non versionné) contenant les paramètres de la base de données et autres configurations sensibles

Installation
Cloner le dépôt sur votre serveur ou machine locale :

bash
git clone https://github.com/WebSiteMaker24/PEPINPHP.git
Configurer votre serveur web pour pointer vers le dossier /public_html/public/ comme racine web (DocumentRoot).

Copier le fichier .env.example en .env et configurer vos variables avec vos paramètres :

# Configuration base de données
DB_HOST=localhost
DB_NAME=nom_de_votre_base
DB_USER=utilisateur
DB_PASS=votre_mot_de_passe

# Configuration SMTP
SMTP_HOST=smtp.example.com
SMTP_PORT=587
SMTP_USER=votre_email@example.com
SMTP_PASS=votre_mot_de_passe_smtp
SMTP_SECURE=tls

# Autres paramètres
DEBUG_MODE=true
Installer la base de données en exécutant le script PHP installDatabase.php si nécessaire.

Configuration
Configurer vos URLs dans url.php :

php
define('URL_ACCUEIL', '?url=accueil');
define('URL_CONTACT', '?url=contact');
// Ajoutez vos routes ici
Configurer les paramètres SMTP et informations entreprise dans sendmail.php :

php
define('COMPANY_EMAIL', 'votre.email@exemple.com');
define('SMTP_PASSWORD', 'votre_mdp_application_smtp');
Complétez ce fichier avec vos identifiants SMTP (ex : Google API).

Utilisation
Toutes les pages sont accessibles via le paramètre ?url=nom_de_la_page.

Le routeur dans src/control/ControlRoute.php charge la vue correspondante selon ce paramètre.

Les templates header.php, navbar.php, et footer.php sont inclus automatiquement.

Routage
Les routes sont définies dans src/control/ControlRoute.php dans la méthode route(). Exemple :

php
switch($page) {
    case 'accueil':
        $page = '/src/view/navigation/accueil.php';
        break;
    case 'contact':
        $page = '/src/view/navigation/contact.php';
        break;
    // Ajouter vos routes ici
    default:
        $page = '/src/view/navigation/404.php';
}
Les constantes d'URL sont dans url.php pour utilisation dans les liens :

php
<a href="<?php echo URL_ACCUEIL; ?>">Accueil</a>
Contribution
Ce framework est open source. Toute contribution est la bienvenue via pull requests ou issues sur GitHub.
Merci de respecter la structure et le style du projet pour faciliter la maintenance.

Contact
Pour toute question ou suggestion, contactez-moi via :

Email : contact@websitemaker.fr

GitHub : github.com/WebSiteMaker24

Clone : git clone https://github.com/WebSiteMaker24/PepinPHP.git

Licence
Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus de détails.

PepinPHP — Simple, léger, modulaire.
