# PepinPHP

PepinPHP est un framework PHP léger, modulaire, et simple à utiliser, basé sur le modèle HMVC (Hierarchical Model View Controller).  
Il facilite la gestion du routage, l’organisation des vues et modules, et permet une extension facile de vos projets web.

---

## Table des matières

- [Présentation](#présentation)  
- [Structure du projet](#structure-du-projet)  
- [Installation](#installation)  
- [Configuration](#configuration)  
- [Utilisation](#utilisation)  
- [Routage](#routage)  
- [Contribution](#contribution)  
- [Contact](#contact)  

---

## Présentation

PepinPHP est conçu pour être minimaliste et efficace, idéal pour des projets PHP qui veulent garder un contrôle simple sur l’architecture HMVC.  
Il inclut un système de routage via paramètres URL, un découpage clair des templates, et supporte l’envoi d’emails via PHPMailer.

---

## Structure du projet

La racine du projet est le dossier contenant notamment ces fichiers et dossiers :

/Autoload.php
/Bootstrap.php
/url.php
/sendmail.php
/phpmailer/
/public_html/
/src/
.env
README.md

yaml
Copier
Modifier

- **/public_html/public/** : dossier public accessible via le serveur web (CSS, JS, images, etc.)  
- **/src/** : code source PHP organisé selon l’architecture HMVC, séparant les modules indépendants (ex : gestion utilisateurs, compteur de visites) du noyau MVC principal (contrôleurs, modèles, vues).  
Chaque module contient sa propre logique métier (contrôleur et modèle) pour une meilleure modularité. 
- **/phpmailer/** : librairie PHPMailer pour l’envoi d’emails  
- **url.php** : définitions des constantes d’URL utilisées pour le routage  
- **sendmail.php** : gestion de l’envoi d’emails (configuration SMTP nécessaire)  
- **.env** : fichier de configuration des variables d’environnement (non versionné)

---

## Installation

1. Cloner le dépôt sur votre serveur ou machine locale  
```bash
git clone https://github.com/WebSiteMaker24/PEPINPHP.git
Configurer votre serveur web pour pointer vers le dossier /public_html/public/ comme racine web (DocumentRoot)

Copier le fichier .env.example en .env et configurer vos variables (base de données, SMTP, etc.)

Installer la base de données en exécutant le script PHP installDatabase.php si nécessaire

Configuration
Configurez vos URLs dans url.php :

php
Copier
Modifier
define('URL_ACCUEIL', '?url=accueil');
define('URL_CONTACT', '?url=contact');
// Ajoutez vos routes ici
Paramètres SMTP et informations entreprise dans un fichier de configuration à compléter (exemple) :

php
Copier
Modifier
define('COMPANY_EMAIL', 'votre.email@exemple.com');
define('SMTP_PASSWORD', 'votre_mdp_application_smtp');
Pour l’envoi d’emails, complétez sendmail.php avec vos identifiants SMTP (ex: Google API)

Utilisation
Toutes les pages sont accessibles via le paramètre ?url=nom_de_la_page

Le routeur dans ControlRoute.php charge la vue correspondante selon ce paramètre

Les templates header.php, navbar.php, et footer.php sont inclus automatiquement

Routage
Les routes sont définies dans src/control/ControlRoute.php dans la méthode route(). Exemple :

php
Copier
Modifier
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
Les constantes d’URL sont dans url.php pour utilisation dans les liens :

php
Copier
Modifier
<a href="<?php echo URL_ACCUEIL; ?>">Accueil</a>
Contribution
Ce framework est open source. Toute contribution est la bienvenue via pull requests ou issues sur GitHub.
Merci de respecter la structure et le style du projet pour faciliter la maintenance.

Contact
Pour toute question ou suggestion, contactez-moi via :

Email : greystormwebmaster@gmail.com

GitHub : https://github.com/WebSiteMaker24

Licence
Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus de détails.

PepinPHP — Simple, léger, modulaire.
