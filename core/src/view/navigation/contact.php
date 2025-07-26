<!-- src/view/navigation/contact.php -->
<?php use control\ControlMain; ?>

<div class="container">
    <h1>Contactez WebSiteMaker</h1>
    <p>Pour toute question ou suggestion d'amélioration, vous pouvez me contacter via :</p>
    <?= ControlMain::message_flash(); ?>
    <div class="info-block">
        <p><strong>Email :</strong> <a href="mailto:contact@websitemaker.fr">contact@websitemaker.fr</a></p>
        <p><strong>GitHub :</strong> <a href="https://github.com/WebSiteMaker24" target="_blank"
                rel="noopener noreferrer">github.com/WebSiteMaker24</a></p>
    </div>

    <h2>À propos du formulaire de contact</h2>
    <p>
        Un fichier <code>sendmail.php</code> est prévu avec <code>PHPMailer</code> pour envoyer des emails via SMTP.
        Toutes les constantes nécessaires sont déjà définies dans le fichier <code>core/Constantes.php</code>,
        donc <code>sendmail.php</code> n’a pas besoin d’être configuré, sauf si vous souhaitez ajouter ou retirer
        un champ dans le formulaire.
    </p>
    <p>
        Le contenu HTML de l’email envoyé est défini dans le fichier <code>view/form/contact_form.php</code>,
        qui sert de modèle (template) pour le message. Vous pouvez facilement y adapter les couleurs, polices ou
        éléments visuels selon votre charte graphique.
    </p>
    <p style="font-style: italic; color: #7f8c8d;">
        Créez le mot de passe dans votre console Google si vous utilisez Gmail, avec l’authentification à deux facteurs
        activée.
    </p>
    <a href="https://myaccount.google.com/apppasswords" target="_blank" rel="noopener noreferrer">Votre mot de passe
        SMTP GMAIL</a>

    <form method="post">
        <input type="text" name="name" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <input type="tel" name="phone" placeholder="Votre téléphone" required>
        <textarea name="message" rows="5" placeholder="Votre message" required></textarea>

        <script>
            (() => {
                const form = document.querySelector('form');
                if (!form) {
                    console.error('Formulaire introuvable pour reCAPTCHA.');
                    return;
                }
                form.addEventListener('submit', function (event) {
                    event.preventDefault();
                    const oldToken = form.querySelector('input[name="g-recaptcha-response"]');
                    if (oldToken) oldToken.remove();
                    grecaptcha.ready(() => {
                        grecaptcha.execute('<?= getenv('CAPTCHA_KEY'); ?>', {
                            action: 'formulaire'
                        })
                            .then(token => {
                                if (!token) {
                                    alert(
                                        'Impossible de valider le formulaire. Veuillez réessayer.'
                                    );
                                    return;
                                }
                                const input = document.createElement('input');
                                input.type = 'hidden';
                                input.name = 'g-recaptcha-response';
                                input.value = token;
                                form.appendChild(input);
                                form.submit();
                            })
                            .catch(() => {
                                alert(
                                    'Erreur lors de la validation reCAPTCHA. Veuillez rafraîchir la page et réessayer.'
                                );
                            });
                    });
                });
            })();
        </script>

        <input type="hidden" value="contact_form" name="action">
        <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
        <button type="submit" class="btn">Envoyer</button>
    </form>

    <h2>Fonctionnement du formulaire</h2>
    <p>
        Le formulaire est protégé contre les envois frauduleux grâce à deux mécanismes de sécurité :
    </p>
    <ul>
        <li><strong>🛡️ Jeton CSRF (Cross Site Request Forgery)</strong> : un jeton unique est généré à chaque
            chargement de page et ajouté automatiquement dans le formulaire via :
            <br><code>&lt;input type="hidden" name="csrf_token" value="..."&gt;</code>
            <br>Ce jeton est ensuite vérifié côté serveur lors de la soumission du formulaire.
        </li>
        <li><strong>✅ Google reCAPTCHA v3</strong> : le formulaire utilise l’API invisible de Google pour évaluer
            automatiquement si la soumission est faite par un humain.
            <br>Un jeton reCAPTCHA est généré côté client via :
            <br><code>grecaptcha.execute(...)</code> puis ajouté dynamiquement avant l’envoi du formulaire.
        </li>
    </ul>

    <h3>📥 Données envoyées</h3>
    <p>Lors de la soumission, le formulaire envoie les champs suivants au serveur :</p>
    <ul>
        <li><code>name</code> – le nom de l’utilisateur</li>
        <li><code>email</code> – l’adresse email</li>
        <li><code>phone</code> – le numéro de téléphone</li>
        <li><code>message</code> – le contenu du message</li>
        <li><code>csrf_token</code> – jeton de sécurité contre les attaques CSRF</li>
        <li><code>g-recaptcha-response</code> – jeton généré par Google reCAPTCHA</li>
        <li><code>action</code> – identifiant du formulaire (ici <code>contact_form</code>)</li>
    </ul>

    <h3>🔐 Traitement côté serveur</h3>
    <p>Le fichier PHP qui traite le formulaire :</p>
    <ul>
        <li>Vérifie la validité du jeton CSRF.</li>
        <li>Valide le token reCAPTCHA en appelant l’API Google avec une clé secrète.</li>
        <li>Vérifie les champs obligatoires et la validité des formats.</li>
        <li>Si tout est valide : envoie l’email via <code>PHPMailer</code> (ou enregistre en base selon configuration).
        </li>
        <li><strong>Gère l’envoi via le fichier <code>sendmail.php</code> qui utilise la bibliothèque
                <code>PHPMailer</code></strong> pour envoyer le message par email via SMTP.</li>
        <li>Affiche ensuite un message flash (succès ou erreur) avec <code>ControlMain::message_flash()</code>.</li>
    </ul>

</div>

<script>
    window.addEventListener('load', function () {
        setTimeout(function () {
            const badge = document.querySelector('.grecaptcha-badge');
            if (badge) badge.classList.add('grecaptcha-hide');
        }, 2000);
    });
</script>

<!-- CAPTCHA -->
<script src="https://www.google.com/recaptcha/api.js?render=<?= getenv('CAPTCHA_KEY'); ?>"></script>