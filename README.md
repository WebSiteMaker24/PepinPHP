# PepinPHP v5

**PepinPHP v5** est un micro-framework PHP modulaire et ultra-lisible, construit autour du modèle **HMVC** (Hierarchical Model View Controller). Cette version met l'accent sur l'évolutivité, les performances, la sécurité et la simplicité de déploiement, avec un routage entièrement personnalisable et un système de cache.

---

## Table des matières

- [Présentation](#présentation)  
- [Nouveautés de la V5](#nouveautés-de-la-v5)  
- [Structure du projet](#structure-du-projet)  
- [Installation](#installation)  
- [Configuration](#configuration)  
- [Utilisation](#utilisation)  
- [Envoi d'emails](#envoi-demails)  
- [Routage](#routage)  
- [Contribution](#contribution)  
- [Contact](#contact)  
- [Licence](#licence)  

---

## Présentation

**PepinPHP v5** s'adresse aux développeurs qui veulent un framework rapide à prendre en main, sans dépendances externes lourdes, tout en gardant une architecture propre, modulaire et organisée.

Fonctionnalités principales :

- Système de routage personnalisable avec préfixe d'URL automatique (local vs prod)  
- Inclusion dynamique des vues et métadonnées  
- Moteur de cache HTML (pages statiques) activable  
- Logger PHP interne pour débogage  
- Formulaires sécurisés avec vérification CSRF  
- Envoi de mail via PHPMailer avec template personnalisé  
- Templates structurés (header / footer / navbar)  

---

## Nouveautés de la V5

- Nouveau système de cache via `ControlMain` (`startCache()` / `endCache()`)  
- Logger d'erreur personnalisé avec stockage dans `src/log/php_errors.log`  
- Constantes centralisées pour URL, entreprises, visuels et infos SMTP  
- `ControlRoute` modernisé avec définition des métadonnées et variables par page  
- Système de purge manuelle du cache  
- Email contact personnalisé via template HTML  

---

## Structure du projet

```
PepinPHPv5

├─ core
│ ├─ .env # Configuration environnementale
│ ├─ Autoload.php # Chargement automatique des classes
│ ├─ Bootstrap.php # Initialisation de l’application
│ ├─ Constantes.php # Constantes globales (routes, infos, SMTP...)
│ ├─ sendmail.php # Envoi d’email avec PHPMailer
│ ├─ phpmailer/ # Librairie PHPMailer
│ └─ src
│ ├─ cache/pages # Cache HTML statique des pages
│ ├─ control # Contrôleurs
│ ├─ csrf # Protection CSRF
│ ├─ envloader # Chargement du .env
│ ├─ log # Logs (php_errors.log, form-errors.log)
│ ├─ middleware # Middleware divers
│ ├─ model # Modèles (accès base de données)
│ ├─ module # Modules spécifiques (users, newsletter, etc.)
│ └─ view # Vues (templates, formulaires, navigation...)
├─ public_html
│ ├─ .htaccess # Règles de réécriture URL pour la production
│ ├─ favicon.ico # Icône du site
│ ├─ index.php # Point d’entrée, gestion du routage
│ ├─ licence.txt # Licence du projet
│ ├─ readme.md # Documentation
│ ├─ robots.txt # Fichier robots
│ ├─ sitemap.xml # Plan du site
│ └─ public
│ ├─ css # Feuilles de style
│ ├─ download # Fichiers téléchargeables
│ ├─ font # Polices
│ ├─ img # Images (logo, bannières...)
│ └─ js # Scripts JavaScript
```

---

## Installation

1. Cloner le dépôt :

```bash
git clone https://github.com/WebSiteMaker24/PepinPHPv5.git
```

2. Configurer votre serveur web pour que la racine pointe sur `public_html/public/`

3. Copier `env.txt` en `.env` et le configurer :

```env
SMTP_PASSWORD=
CAPTCHA_KEY=
CAPTCHA_SECRET=
```

4. C'est prêt. Vous pouvez accéder au site.

---

## Configuration

Tout est centralisé dans `core/Constantes.php` :

```php
define('URL_PREFIX', '?url='); // En local
// define('URL_PREFIX', '/'); // En prod

define('URL_ACCUEIL', URL_PREFIX . 'accueil');
define('URL_CONTACT', URL_PREFIX . 'contact');

// Infos entreprise
define('NOM_ENTREPRISE', 'WebSiteMaker');
define('EMAIL_ENTREPRISE', 'contact@websitemaker.fr');
```

---

## Utilisation

Les routes sont automatiquement résolues par le routeur à partir de l'URL.

- En local : `http://localhost/votreprojet?url=accueil`  
- En production : `https://votredomaine.fr/accueil`

Utilisez toujours les constantes `URL_...` dans vos vues pour simplifier la maintenance.

---

## Envoi d'emails

Un fichier `sendmail.php` prêt à l'emploi utilise **PHPMailer** pour envoyer des emails via SMTP.

- Toutes les constantes SMTP sont déjà définies dans `core/Constantes.php` → aucune configuration supplémentaire n'est requise.
- Le template HTML de l'email se trouve dans `view/form/contact_form.php`
- Vous pouvez personnaliser les couleurs ou la charte graphique dans ce fichier.
- Si vous voulez ajouter ou retirer un champ du formulaire, modifiez simplement `sendmail.php` et le template associé.

---

## Routage

Le routeur principal `ControlRoute.php` gère dynamiquement les pages, les métadonnées et les variables affichées.

```php
switch ($page) {
    case 'accueil':
        $title = "Accueil - WebSiteMaker";
        $page = '/src/view/navigation/accueil.php';
        break;
    case 'contact':
        $title = "Contact - WebSiteMaker";
        $page = '/src/view/navigation/contact.php';
        break;
    default:
        $title = "Erreur 404";
        $page = '/src/view/navigation/404.php';
        break;
}
```

Les pages HTML peuvent être mises en cache pour accélérer le temps de chargement.

---

## Contribution

Ce projet est open source. Toute aide est la bienvenue ! Merci de respecter la structure du framework.

---

## Contact

**Email :** contact@websitemaker.fr  
**GitHub :** [WebSiteMaker24](https://github.com/WebSiteMaker24)

---

## Licence

Ce projet est sous licence **MIT**. Voir le fichier LICENSE pour plus d'infos.

---

**PepinPHP** : rapide, simple, modulaire, et totalement personnalisable pour vos projets PHP.
