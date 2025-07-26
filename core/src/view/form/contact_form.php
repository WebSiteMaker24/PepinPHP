<div style="width: 100%; background-color: #0B1D3A; padding: 40px 0; font-family: Montserrat, sans-serif;">
    <div
        style="max-width: 600px; margin: auto; background-color: #f5f5f5; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.2);">

        <!-- En-tête -->
        <div style="background-color: #8B0000; color: #FFD700; padding: 20px;">
            <h1 style="margin: 0; font-size: 24px;"><?= COMPANY_NAME; ?></h1>
            <p style="margin: 5px 0 0;"><?= COMPANY_SLOGAN; ?></p>
        </div>

        <!-- Contenu principal -->
        <div style="padding: 20px; color: #1A1A1A;">
            <h2 style="color: #8B0000; font-size: 1.2em;">📬 Nouveau message reçu</h2>
            <p style="font-size: 1.2em;"><strong>👤 Nom :</strong> <?= htmlspecialchars($name); ?></p>
            <p style="font-size: 1.2em;"><strong>📧 Email :</strong> <a href="mailto:<?= htmlspecialchars($email); ?>"
                    style="color: #0B1D3A; font-size: 1.2em;"><?= htmlspecialchars($email); ?></a></p>
            <p style="font-size: 1.2em;"><strong>📞 Téléphone :</strong> <?= htmlspecialchars($phone); ?></p>
            <p style="font-size: 1.2em;"><strong>📝 Message :</strong><br><?= nl2br(htmlspecialchars($message)); ?></p>
        </div>

        <!-- Pied -->
        <div style="background-color: #e0e0e0; padding: 15px 20px; font-size: 13px; color: #1A1A1A;">
            <p style="margin: 10px 0;">📍 <?= COMPANY_ADDRESS; ?></p>
            <p style="margin: 10px 0;">📞 <a href="tel:0695577389" style="color: #8B0000;">06 95 57 73 89</a></p>
            <p style="margin: 10px 0;">📧 <a href="mailto:<?= COMPANY_EMAIL; ?>"
                    style="color: #8B0000;"><?= COMPANY_EMAIL; ?></a></p>
        </div>
    </div>

    <!-- Footer global -->
    <p style="text-align: center; font-size: 12px; color: #ccc; margin-top: 20px;">
        Ce message a été généré automatiquement depuis <strong style="color: #FFD700;"><?= URL_DOMAINE_TXT; ?></strong>
    </p>
</div>