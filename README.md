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

/
├── Autoload.php
├── Bootstrap.php
├── url.php
├── sendmail.php
├── phpmailer/
├── public_html/
│ └── public/ # Dossier public (CSS, JS, images, etc.)
├── src/
│ ├── control/ # Contrôleurs HMVC
│ ├── model/ # Modèles
│ └── view/ # Vues
├── .env # Variables d'environnement (non versionnées)
├── README.md

yaml
Copier
Modifier

---

## Installation

1. Cloner le dépôt :  
```bash
git clone https://github.com/WebSiteMaker24/PEPINPHP.git
Configurer votre serveur web pour que la racine pointe sur public_html/public/.

Copier .env.example en .env et configurer vos variables (obligatoire) :

env
Copier
Modifier
# Base de données
DB_HOST=localhost
DB_NAME=nom_de_votre_base
DB_USER=utilisateur
DB_PASS=votre_mot_de_passe

# SMTP
SMTP_HOST=smtp.example.com
SMTP_PORT=587
SMTP_USER=votre_email@example.com
SMTP_PASS=votre_mot_de_passe_smtp
SMTP_SECURE=tls

# Autres
DEBUG_MODE=true
(Optionnel) Installer la base de données avec installDatabase.php.

⚠️ L’application ne fonctionne pas sans un fichier .env configuré correctement.

Configuration
Définir vos routes dans url.php :

php
Copier
Modifier
define('URL_ACCUEIL', '?url=accueil');
define('URL_CONTACT', '?url=contact');
// Ajouter vos routes ici
Configurer SMTP dans sendmail.php :

php
Copier
Modifier
define('COMPANY_EMAIL', 'votre.email@exemple.com');
define('SMTP_PASSWORD', 'votre_mdp_application_smtp');
// Compléter avec vos identifiants SMTP
Utilisation
Accéder aux pages via ?url=nom_de_la_page.

Le routeur (src/control/ControlRoute.php) charge la vue associée.

Templates header.php, navbar.php, footer.php inclus automatiquement.

Routage
Exemple dans ControlRoute.php :

php
Copier
Modifier
switch ($page) {
    case 'accueil':
        $page = '/src/view/navigation/accueil.php';
        break;
    case 'contact':
        $page = '/src/view/navigation/contact.php';
        break;
    default:
        $page = '/src/view/navigation/404.php';
}
Utiliser les constantes URL dans les liens :

php
Copier
Modifier
<a href="<?php echo URL_ACCUEIL; ?>">Accueil</a>
Contribution
Projet open source. Contributions via pull requests ou issues sur GitHub.
Respecter la structure et le style pour faciliter la maintenance.

Contact
Email : contact@websitemaker.fr

GitHub : github.com/WebSiteMaker24

Clone :

bash
Copier
Modifier
git clone https://github.com/WebSiteMaker24/PepinPHP.git
Licence
Ce projet est sous licence MIT. Voir le fichier LICENSE.

PepinPHP — Simple, léger, modulaire.

css
Copier
Modifier
