<?php require_once __DIR__ . $jsonld; ?>

<!DOCTYPE html>
<html lang="fr">

<!-- site toujours en developpement, bonne visite ! -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="alternate" href="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>" hreflang="fr">
    <link rel="alternate" href="<?= htmlspecialchars($canonical); ?>" hreflang="x-default">

    <meta name="description" content="<?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta name="keyword" content="<?= htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8'); ?>">

    <meta name="author" content="<?= COMPANY_NAME; ?>">
    <meta name="phone" content="<?= COMPANY_PHONE_LINK; ?>">
    <meta name="email" content="<?= COMPANY_EMAIL; ?>">
    <meta name="address" content="<?= COMPANY_ADDRESS; ?>">
    <meta name="robots" content="<?= htmlspecialchars($robot, ENT_QUOTES, 'UTF-8'); ?>">

    <meta name="geo.placename" content="<?= GEO_PLACENAME; ?>">
    <meta name="geo.region" content="<?= GEO_REGION; ?>">
    <meta name="geo.position" content="<?= GEO_POSITION; ?>">

    <meta property="og:description" content="<?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= htmlspecialchars($canonical, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?= IMG_OG; ?>">
    <meta property="og:locale" content="fr">

    <!-- Canonical -->
    <link rel="canonical" href="<?= htmlspecialchars($canonical); ?>">
    <meta name="ICBM" content="43.0650046,0.1495378">

    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>

    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="public/css/style.css">

    <script type="application/ld+json">
    <?= json_encode($structuredData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
    </script>

    <style>
        :root {
            --color-primary: #009C86;
            --color-primary2: #00aaff;
            --color-white: #fff;
            --color-white2: #fdf5f5ff;
            --color-primary-strong: #1B2E35;
            --color-black: #111;
            --padding: 15px 20px;
            --margin-top: 25px;
        }

        @font-face {
            font-family: "Poppins";
            src: url("/public/font/Poppins-Regular.ttf") format("woff2");
            font-weight: 400;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "Poppins";
            src: url("/public/font/Poppins-Light.ttf") format("woff2");
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: "Poppins";
            src: url("/public/font/Poppins-Black.ttf") format("woff2");
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            scroll-behavior: smooth;
            list-style-type: none;
            font-family: "Poppins", sans-serif;
            transition: 0.3s ease;
            z-index: 1;
        }

        a {
            text-decoration: none;
        }

        input,
        a,
        button {
            cursor: pointer;
        }

        a,
        p {
            color: #1B2E35;
        }

        .btn {
            display: inline-block;
            background: sandybrown;
            border-radius: 5px;
            color: var(--color-black);
            padding: 15px 20px;
            box-shadow: 1px 1px 5px var(--color-black);
            width: fit-content;
        }

        /* GESTION DES MESSAGES */
        .message-flash {
            width: 100%;
            margin: 10px auto;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.08);
        }

        /* Icône à gauche */
        .message-flash svg {
            font-size: 18px;
            margin-right: 5px;
        }

        /* Couleurs selon le type de message */
        .message-flash.success {
            background-color: #4CAF50;
            /* vert */
        }

        .message-flash.error {
            background-color: #F44336;
            /* rouge */
        }

        .message-flash.info {
            background-color: #2196F3;
            /* bleu */
        }

        .message-flash.success svg {
            fill: #d0f0d0;
        }

        .message-flash.error svg {
            fill: #ffd6d6;
        }

        .message-flash.info isvg {
            fill: #d0e7ff;
        }
    </style>

</head>


<body>

