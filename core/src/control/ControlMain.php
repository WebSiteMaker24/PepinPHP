<?php

namespace control;

class ControlMain
{
    public function __construct()
    {
    }

    public static function message_flash(): string|null
    {
        if (isset($_SESSION["message_success"])) {
            $message = $_SESSION["message_success"];
            unset($_SESSION["message_success"]);
            return '<div class="message-flash success"><svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" style="width: 18px;" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
    y="0px" viewBox="0 0 116.3 116.1" style="enable-background:new 0 0 116.3 116.1;" xml:space="preserve">
    <path class="st0" d="M58.62,0C28.25-0.24,0.08,25.41,0,57.98c-0.08,33.05,28.28,59.33,57.86,58.05
    c29.54,1.55,58.45-24.27,58.44-57.86C116.29,24.48,87.46,0.23,58.62,0z M57.59,104.84c-25.94-0.61-46.34-20.77-46.33-46.88
    C11.28,31.54,31.81,11.2,58.4,11.25c26.13,0.04,46.5,20.73,46.63,46.95C105.16,84.11,82.77,105.43,57.59,104.84z" />
    <path class="st0" d="M87.11,34.99c-3.31-3.28-3.65-3.28-6.92-0.05c-9.84,9.75-19.7,19.46-29.46,29.29
    c-1.65,1.66-2.68,2.03-4.35,0.06c-2.26-2.66-4.79-5.08-7.24-7.57c-7.03-7.15-5.54-7.51-13.29,0.17c-1.83,1.82-1.77,3.28,0.02,5.05
    c6.83,6.75,13.6,13.57,20.4,20.36c0.61,0.61,1.21,1.29,1.56,1.28c2.37,0.02,3.23-1.36,4.26-2.38C63.79,69.61,75.47,58,87.14,46.39
    C93.22,40.34,93.47,41.29,87.11,34.99z" />
</svg>
' . htmlspecialchars($message) . '</div>';
        }

        if (isset($_SESSION["message_error"])) {
            $message = $_SESSION["message_error"];
            unset($_SESSION["message_error"]);
            return '<div class="message-flash error">
    <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" style="width: 18px;" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
    y="0px" viewBox="0 0 116.48 115.98" style="enable-background:new 0 0 116.48 115.98;" xml:space="preserve">
    <path class="st0" d="M58.79,0.09C28.75-1.72-0.06,24.93,0,58.09c0.06,33.17,28.82,59.37,58.23,57.82
    c29.41,1.49,58.22-24.38,58.25-57.82C116.52,24.43,87.69-1.13,58.79,0.09z M58.1,104.83c-24.16,1.13-46.86-20.67-46.79-46.89
    c0.06-25.68,22.43-47.07,47.48-46.84c23.77,0.21,46.61,20.52,46.63,46.97C105.45,84.39,82.63,106.14,58.1,104.83z" />
    <path class="st0" d="M49.97,50.97c0.25,3.61,0.41,7.22,0.51,10.83c0.04,1.61,0.39,2.96,2.33,3.69c3.24,0,6.73,0.01,10.22-0.01
    c0.49,0,0.97-0.14,1.47-0.22c1.7-1.5,1.55-3.19,1.62-4.79c0.39-9.59,0.75-19.18,1.12-28.77c0.11-2.87-0.51-3.64-3.31-3.7
    c-3.62-0.08-7.24-0.06-10.85-0.01c-3.41,0.05-4.22,0.79-3.94,4.3C49.65,38.52,49.53,44.76,49.97,50.97z" />
    <path class="st0" d="M58.15,70.74c-5.2,0.04-9.98,4.75-9.76,9.86c0.28,6.36,5.85,9.93,9.93,9.74c5.41-0.25,9.65-4.44,9.61-9.91
    C67.9,74.99,63.55,70.69,58.15,70.74z" />
</svg>
ac' . htmlspecialchars($message) . '
</div>';
        }

        if (isset($_SESSION["message_info"])) {
            $message = $_SESSION["message_info"];
            unset($_SESSION["message_info"]);
            return '<div class="message-flash info">
    <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" style="width: 18px;" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" viewBox="0 0 116.29 116.09" style="enable-background:new 0 0 116.29 116.09;"
        xml:space="preserve">
        <path class="st0" d="M58.23,0.06C28.31-1.38,0.08,25.06,0,57.74c-0.08,33.04,28.28,58.22,57.86,58.35
    c29.54,0.13,58.44-24.58,58.42-58.17C116.27,24.29,87.46-1.3,58.23,0.06z M57.81,104.65c-26.18-0.05-46.58-20.67-46.49-46.97
    c0.09-26.35,20.69-46.57,47.35-46.49c25.87,0.08,46.39,20.79,46.37,46.79C105.01,84.24,84.31,104.7,57.81,104.65z" />
        <path class="st0" d="M69.18,76.83c-4.36,0.44-3.66-2.46-3.66-5.01c0.01-2.62,0-5.24,0-7.86c0-3.25-0.07-6.49,0.02-9.74
    c0.08-2.67-0.99-3.9-3.75-3.83c-3.99,0.11-8,0.2-11.98-0.03c-3.61-0.21-5.11,1.19-4.74,4.77c0.13,1.24,0.02,2.49,0.06,3.74
    c0.04,1.41,0.76,2.75,2.12,2.62c3.84-0.36,3.43,2.12,3.4,4.51c-0.03,2.5-0.07,4.99,0.01,7.49c0.07,1.98-0.15,3.39-2.74,3.22
    c-2.02-0.14-2.82,1.27-2.82,3.16c0,1.5,0.03,3-0.01,4.49c-0.07,2.55,1.19,3.56,3.68,3.54c6.24-0.06,12.48-0.07,18.72,0
    c2.48,0.03,3.78-0.96,3.76-3.49c-0.01-1.62,0.02-3.25-0.04-4.87C71.17,78.19,70.51,76.7,69.18,76.83z" />
        <path class="st0" d="M58.07,45.2c5.37,0.03,9.76-4.32,9.8-9.7c0.03-5.37-4.33-9.8-9.66-9.83c-5.24-0.03-9.85,4.49-9.9,9.7
    C48.26,40.55,52.85,45.17,58.07,45.2z" />
    </svg>
    ' . htmlspecialchars($message) . '
</div>';
        }

        return null;
    }

    public static function setupErrorLogging()
    {
        ini_set('display_errors', 0);
        error_reporting(E_ALL);
        ini_set('log_errors', 1);
        ini_set('error_log', __DIR__ . '/../log/php_errors.log');

        set_error_handler(function ($severity, $message, $file, $line) {
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'IP inconnue';
            $date = date('Y-m-d H:i:s');
            error_log("[$date] Erreur [$severity] depuis $ip : $message dans $file à la ligne $line");
            return false; // Pour laisser PHP gérer aussi l’erreur normalement
        });

        set_exception_handler(function ($exception) {
            $ip = $_SERVER['REMOTE_ADDR'] ?? 'IP inconnue';
            $date = date('Y-m-d H:i:s');
            error_log("[$date] Exception non capturée depuis $ip : " . $exception->getMessage() . ' dans ' . $exception->getFile() .
                ' à la ligne ' . $exception->getLine());
        });
    }


    public static function startCache(): ?string
    {
        $uri = $_SERVER['REQUEST_URI'];
        $cache_key = md5($uri);
        $cache_dir = __DIR__ . '/../cache/pages/';
        $cache_file = $cache_dir . $cache_key . ".html";
        $cache_duration = 5;

        if (!is_dir($cache_dir)) {
            mkdir($cache_dir, 0755, true);
        }

        if (file_exists($cache_file) && (time() - filemtime($cache_file)) < $cache_duration) {
            echo
                file_get_contents($cache_file);
            exit;
        }
        ob_start();
        return $cache_file;
    }
    public static function endCache(
        ?string
        $cache_file
    ): void {
        if (!$cache_file)
            return;
        $html = ob_get_clean();
        file_put_contents($cache_file, $html);
        echo
            $html;
    }
    public static function MicroTimeStart(): float
    {
        return microtime(true);
    }
    public static function
        MicroTimeEnd(
        float $start
    ): void {
        echo "<!-- Généré en " . round((microtime(true) - $start) * 1000) . " ms -->";
        exit;
    }
}
