<?php

namespace Project\Lib;

class View {
    public static function run($name, array $params = null) {
        if(is_array($params)) {
            foreach ($params as $key => $value) {
                global $$key;
                $$key = $value;
            }
        }

        Session::generateToken();

        $name = preg_replace('/\.+/s', DIRECTORY_SEPARATOR, $name);

        require VIEW_PATH . DIRECTORY_SEPARATOR . $name . '.php';
    }
}