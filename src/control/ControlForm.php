<?php

namespace control;

use csrf\CSRFProtection;
use handlerform\HandlerForm;

class FormController
{
    private CSRFProtection $csrfProtection;
    private HandlerForm $handlerForm;
    private string $logFile;

    public function __construct(CSRFProtection $csrfProtection, HandlerForm $handlerForm, string $logFile)
    {
        $this->csrfProtection = $csrfProtection;
        $this->handlerForm = $handlerForm;
        $this->logFile = $logFile;
    }

    public function handleRequest(): void
    {
        $form = $_POST['action'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || !$this->csrfProtection->validateToken($_POST['csrf_token'])) {
                $_SESSION['message'] = 'Erreur : Token CSRF invalide !';

                $log = "[" . date('Y-m-d H:i:s') . "] Tentative CSRF - IP : " . $_SERVER['REMOTE_ADDR'] . PHP_EOL;
                error_log($log, 3, $this->logFile);

                header('Location: ?url=' . $form);
                exit;
            }

            switch ($form) {
                case 'inscription':
                    $this->handlerForm->inscription();
                    break;
                case 'connexion':
                    $this->handlerForm->connexion();
                    break;
                default:
                    $_SESSION['message'] = 'Erreur : Formulaire invalide !';
                    break;
            }
        }
    }
}