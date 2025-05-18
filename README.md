# PepinPHP v3

**PepinPHP** est un framework PHP léger, modulaire et simple à utiliser, basé sur le modèle **HMVC** (Hierarchical Model View Controller).  
Il facilite le routage, l’organisation des vues/modules, et l’envoi d’emails via PHPMailer.

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
- [Licence](#licence)  

---

## Présentation

Minimaliste et efficace, PepinPHP s'adresse aux projets PHP qui veulent garder un contrôle simple sur une architecture HMVC.  

Fonctionnalités principales :  
- Routage via paramètres URL  
- Découpage clair des templates  
- Envoi d'emails avec PHPMailer  

---

## Structure du projet
PepinPHP v3 - Structure simplifiée

```
PepinPHP
├─ .env
├─ Autoload.php
├─ Bootstrap.php
├─ installDatabase.php
├─ LICENCE.txt
├─ pastille_couleur.txt
├─ README.md
├─ sendmail.php
├─ url.php
├─ phpmailer
│  ├─ Exception.php
│  ├─ PHPMailer.php
│  └─ SMTP.php
├─ public_html
│  ├─ favicon.ico
│  ├─ favicon.png
│  ├─ htaccess.txt
│  ├─ index.php
│  └─ public
│     ├─ css
│     │  └─ style.css
│     ├─ font
│     │  ├─ Poppins-BlackItalic.ttf
│     │  ├─ Poppins-Italic.ttf
│     │  ├─ Poppins-Light.ttf
│     │  └─ Poppins-Regular.ttf
│     ├─ img
│     │  ├─ banner.avif
│     │  └─ PepinPHP.png
│     └─ js
│        ├─ jquery.min.js
│        └─ script.js
└─ src
   ├─ control
   │  ├─ ControlForm.php
   │  ├─ ControlMain.php
   │  └─ ControlRoute.php
   ├─ csrf
   │  └─ CSRFProtection.php
   ├─ handlerform
   │  └─ HandlerForm.php
   ├─ middleware
   │  └─ Middleware.php
   ├─ model
   │  ├─ Database.php
   │  └─ EnvLoader.php
   ├─ module
   │  ├─ comptevisit
   │  │  ├─ ControlVisit.php
   │  │  └─ ModelVisit.php
   │  └─ users
   │     ├─ ControlUser.php
   │     └─ ModelUser.php
   └─ view
      ├─ navigation
      │  ├─ 404.php
      │  ├─ accueil.php
      │  └─ contact.php
      └─ template
         ├─ footer.php
         ├─ header.php
         └─ navbar.php
```

---

## Installation

1. Cloner le dépôt :  

git clone https://github.com/WebSiteMaker24/PepinPHP.git
Configurer votre serveur web pour que la racine pointe sur public_html/public/.

Copier env.txt en .env et configurer vos variables (obligatoire) :

# Base de données
DB_HOST=localhost
DB_NAME=nom_de_votre_base
DB_USER=utilisateur
DB_PASS=votre_mot_de_passe

⚠️ L’application ne fonctionne pas sans un fichier .env configuré correctement.

Configuration
Définir vos routes dans url.php :

define('URL_ACCUEIL', '?url=accueil');
define('URL_CONTACT', '?url=contact');
// Ajouter vos routes ici
Configurer SMTP dans sendmail.php :

define('COMPANY_EMAIL', 'votre.email@exemple.com');
define('SMTP_PASSWORD', 'votre_mdp_application_smtp');
// Compléter avec vos identifiants SMTP

Utilisation
Accéder aux pages via ?url=nom_de_la_page.

Le routeur (src/control/ControlRoute.php) charge la vue associée.

Templates header.php, navbar.php, footer.php inclus automatiquement.

Routage
Exemple dans ControlRoute.php :

```
switch ($page) {
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
```
Utiliser les constantes URL présente dans le fichier url.php dans les liens :

<a href="<?php echo URL_ACCUEIL; ?>">Accueil</a>
Contribution
Projet open source. Contributions via pull requests ou issues sur GitHub.
Respecter la structure et le style pour faciliter la maintenance.

Contact
Email : contact@websitemaker.fr

GitHub : github.com/WebSiteMaker24

Clone : git clone https://github.com/WebSiteMaker24/PepinPHP.git

Licence : Ce projet est sous licence MIT. Voir le fichier LICENSE.

PepinPHP — Simple, léger, modulaire.

