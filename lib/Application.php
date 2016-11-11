<?php

namespace Project\Lib;

class Application {
    private $setting;

    public function __construct($setting) {
        $this->setting = $setting;
        DB::run();
        Session::run();
    }

    public function run() {
        require CONFIG_PATH . DIRECTORY_SEPARATOR . 'route.php';
    }
}