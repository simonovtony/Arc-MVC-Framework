<?php

mb_internal_encoding('UTF-8');

define("PROJECT_PATH", dirname(__DIR__));
define("APP_PATH", PROJECT_PATH . DIRECTORY_SEPARATOR . 'app');
define("CONTROLLER_PATH", APP_PATH . DIRECTORY_SEPARATOR . 'controller');
define("MODEL_PATH", APP_PATH . DIRECTORY_SEPARATOR . 'model');
define("VIEW_PATH", APP_PATH . DIRECTORY_SEPARATOR . 'view');
define("CONFIG_PATH", PROJECT_PATH . DIRECTORY_SEPARATOR . 'config');
define("LIB_PATH", PROJECT_PATH . DIRECTORY_SEPARATOR . 'lib');
define("WEB_PATH", PROJECT_PATH . DIRECTORY_SEPARATOR . 'web');

function require_source($dir_path) {
    $sources = glob($dir_path . DIRECTORY_SEPARATOR . '*.php');

    foreach($sources as $source) {
        require_once $source;
    }
}

function config($name) {
    $source = require (CONFIG_PATH . DIRECTORY_SEPARATOR . $name . '.php');
    return $source;
}

function d($arg) {
    ob_end_clean();
    echo "<pre>\n";
    var_dump($arg);
    echo "</pre>";
    exit;
}

function abort($code, $message) {
    \Project\Lib\View::run("error.index", [
        'code' => $code,
        'message' => $message,
    ]);
}

?>