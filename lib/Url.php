<?php

namespace Project\Lib;

class Url {

    public static function to($path) {
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $path;
        return $url;
    }

    public static function current() {
        $request_uri = $_SERVER['REQUEST_URI'];
        if(($index = strpos($request_uri, '?')) !== false) {
            $request_uri = substr($request_uri, 0, $index);
        }
        $url = "http" . (($_SERVER['SERVER_PORT'] == 443) ? "s://" : "://") . $_SERVER['HTTP_HOST'] . $request_uri;
        return $url;
    }
}