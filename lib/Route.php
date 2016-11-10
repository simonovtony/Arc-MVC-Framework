<?php

namespace Project\Lib;

class Route {
    private static $routes = [];

    public static function get($uri, $controller, $action) {
        static::$routes[] = [
            'uri'        => $uri,
            'method'     => 'GET',
            'controller' => $controller,
            'action'     => $action,
        ];
    }

    public static function post($uri, $controller, $action) {
        static::$routes[] = [
            'uri'        => $uri,
            'method'     => 'POST',
            'controller' => $controller,
            'action'     => $action,
        ];
    }

    public static function run() {
        $uri = $_SERVER['REQUEST_URI'];
        $method = $_SERVER['REQUEST_METHOD'];

        $arg = strpos($uri, '?');
        if($arg !== false) {
            $uri = substr($uri, 0, $arg);
        }

        foreach(static::$routes as $route) {
            if($route['uri']    == $uri
            && $route['method'] == $method)
            {
                $controller = "\\Project\\App\\Controller\\" . $route['controller'];
                $controller = new $controller();
                $controller->{$route['action']}();
                return;
            }
        }

        static::error();
    }

    private static function error() {
        d(new \Exception("No suck route"));
    }
}

?>