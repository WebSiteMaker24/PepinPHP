<?php
require __DIR__ . '/Autoload.php';
define('SMTP_PASSWORD', getenv('SMTP_PASSWORD'));

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require __DIR__ . '/phpmailer/Exception.php';
require __DIR__ . '/phpmailer/PHPMailer.php';
require __DIR__ . '/phpmailer/SMTP.php';
require __DIR__ . '/constantes.php';

// Récupération et nettoyage des données POST
$name = trim($_POST['name'] ?? '');
$name = preg_replace("/[^a-zA-Z0-9 .'-]/", '', $name);
// $phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');

$message = trim($_POST['message'] ?? '');

$token = trim($_POST['csrf_token'] ?? '');

if (empty($name) || empty($email) || empty($message)) {
    $_SESSION['message_error'] = "Tous les champs sont obligatoires.";
    header("Location: " . URL_CONTACT);
    exit;
}

$mail = new PHPMailer(true);
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = COMPANY_EMAIL_SMTP;
    $mail->Password = SMTP_PASSWORD;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;
    $mail->CharSet = 'UTF-8';

    $mail->setFrom(COMPANY_EMAIL_SMTP, $name);
    $mail->addAddress(COMPANY_EMAIL, COMPANY_NAME);
    $mail->isHTML(true);
    $mail->Subject = "Nouveau message via " . URL_DOMAINE_TXT;

    $template_mail = $_POST["action"] ?? "";

    switch ($template_mail) {
        case "contact_form":
            // On récupère le contenu du template dans une variable tampon
            ob_start();
            require __DIR__ . "/src/view/form/contact_form.php";
            $mailBody = ob_get_clean();

            $mail->Body = $mailBody;
            $mail->send();

            $_SESSION['message_success'] = "Merci pour votre message. Nous vous contacterons très bientôt.";
            header("Location: " . URL_CONTACT);
            exit;
        default:
            echo "Action non reconnue.";
            exit;
    }


} catch (Exception $e) {
    echo "Erreur d'envoi : {$mail->ErrorInfo}";
}