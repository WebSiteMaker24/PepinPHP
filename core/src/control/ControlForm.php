<?php

namespace control;

use csrf\CSRFProtection;
// use module\newsletter\ControlNewsletter;

class ControlForm
{
    private CSRFProtection $csrfProtection;
    // private ControlNewsletter $controlNewsletter;
    private string $logFile = __DIR__ . '/../log/form-errors.log';

    public function __construct(CSRFProtection $csrfProtection)
    {
        $this->csrfProtection = $csrfProtection;
        // $this->controlNewsletter = $controlNewsletter;
    }

    public function handleRequest(): void
    {
        $form = $_POST['action'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Si le token crsf n'est pas valide
            if (!isset($_POST['csrf_token']) || !$this->csrfProtection->validateToken($_POST['csrf_token'])) {
                $_SESSION['message_error'] = 'Erreur : Token CSRF invalide !';
                $this->logError();
                die($_SESSION['message_error']);
            }

            $email = $_POST['email'] ?? null;

            // *** Vérification reCAPTCHA v3 ***
            $recaptcha = $_POST['g-recaptcha-response'] ?? '';
            $secret = getenv('CAPTCHA_SECRET');

            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$recaptcha");
            $result = json_decode($response, true);

            if (!$result['success'] || ($result['score'] ?? 0) < 0.5) {
                $_SESSION['message_error'] = "Vérification anti-bot échouée. Veuillez réessayer.";
                header("Location: " . URL_CONTACT);
                exit;
            }
            // *** Fin vérification reCAPTCHA ***

            // Action valide
            $validForms = ['contact_form'];
            if (!in_array($form, $validForms)) {
                header("Location:" . URL_ACCUEIL);
                exit;
            }

            switch ($form) {
                case 'contact_form':
                    require_once __DIR__ . "/../../sendmail.php";
                    break;
                default:
                    $_SESSION['message_error'] = 'Erreur : Formulaire invalide !';
                    break;
            }
        }
    }
    private function isValidEmail(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }
    public function logError()
    {
        $log = "[" . date('Y-m-d H:i:s') . "] Tentative CSRF - IP : " . $_SERVER['REMOTE_ADDR'] . PHP_EOL;
        error_log($log, 3, $this->logFile);
    }
}