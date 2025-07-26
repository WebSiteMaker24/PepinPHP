<?php

declare(strict_types=1);

use control\ControlMain;

$path = __DIR__ . "/../core/";
require_once $path . "Constantes.php";
require_once $path . "Autoload.php";
require_once $path . "Bootstrap.php";

ControlMain::setupErrorLogging();

$app = new Bootstrap();

$cache_file = ControlMain::startCache();

$app->run();

ControlMain::endCache($cache_file);