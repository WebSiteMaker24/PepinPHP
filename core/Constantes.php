<?php
// constantes.php
// Utilisation de constante pour les routes et informations de votre entreprise afin de centraliser ces données

// Url prefix
if (!defined('URL_PREFIX')) // "?url=" en local, et "/" en prod !!
    define('URL_PREFIX', '?url=');

// Navigation
if (!defined('URL_ACCUEIL'))
    define('URL_ACCUEIL', "/");
if (!defined('URL_SERVICE'))
    define('URL_SERVICE', URL_PREFIX . 'service');

if (!defined('URL_CONTACT'))
    define('URL_CONTACT', URL_PREFIX . 'contact');

// 404
if (!defined('URL_404'))
    define('URL_404', URL_PREFIX . '404');

// Autres liens (réseaux sociaux ou autres)
if (!defined('URL_FACEBOOK'))
    define('URL_FACEBOOK', '#');
if (!defined('URL_GOOGLE'))
    define('URL_GOOGLE', '#');
if (!defined('URL_TWITTER'))
    define('URL_TWITTER', '#');
if (!defined('URL_INSTAGRAM'))
    define('URL_INSTAGRAM', '#');

// Domaine
if (!defined('URL_DOMAINE'))
    define('URL_DOMAINE', 'https://');
if (!defined('URL_DOMAINE_TXT'))
    define('URL_DOMAINE_TXT', '');


// Information entreprise
if (!defined('COMPANY_EMAIL'))
    define('COMPANY_EMAIL', '');
if (!defined('COMPANY_EMAIL_SMTP'))
    define('COMPANY_EMAIL_SMTP', 'greystormwebmaster@gmail.com');

if (!defined('COMPANY_NAME'))
    define('COMPANY_NAME', 'PepinPHP');
if (!defined('COMPANY_PHONE'))
    define('COMPANY_PHONE', '');
if (!defined('COMPANY_PHONE_LINK'))
    define('COMPANY_PHONE_LINK', '');
if (!defined('COMPANY_ADDRESS'))
    define('COMPANY_ADDRESS', '');
if (!defined('COMPANY_SLOGAN'))
    define('COMPANY_SLOGAN', "");
if (!defined('COMPANY_PRICE_HOUR'))
    define('COMPANY_PRICE_HOUR', "");

// Geo information (balise meta)
if (!defined('GEO_PLACENAME'))
    define('GEO_PLACENAME', '');
if (!defined('GEO_CODE_POSTAL'))
    define('GEO_CODE_POSTAL', '');
if (!defined('GEO_REGION'))
    define('GEO_REGION', '');
if (!defined('GEO_POSITION'))
    define('GEO_POSITION', '');
if (!defined('GEO_POSITION_LATITUDE'))
    define('GEO_POSITION_LATITUDE', '');
if (!defined('GEO_POSITION_LONGITUDE'))
    define('GEO_POSITION_LONGITUDE', '');

// Images
if (!defined('IMG_LOGO'))
    define('IMG_LOGO', 'public/img/logo.png');
if (!defined('IMG_OG'))
    define('IMG_OG', 'public/img/og_img.webp');