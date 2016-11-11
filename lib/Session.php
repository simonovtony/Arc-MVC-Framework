<?php

namespace Project\Lib;

class Session {

    public static function run() {
        static::start();
    }

    public static function start() {
        session_start();
        Session::add('token', md5(mt_rand()));
    }

    public static function destroy() {
        if(session_id() != "" || isset($_COOKIE[session_name()])) {
            $_SESSION = [];
            setcookie(session_name() . '' . time() - 259200);
            session_destroy();
        }
    }

    public static function set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function add($key, $value) {
        if(!isset($_SESSION[$key]))
            $_SESSION[$key] = [];
        $_SESSION[$key][] = $value;
    }

    public static function get($key) {
        return $_SESSION[$key];
    }

    public static function remove($key) {
        if(isset($_SESSION[$key]))
            unset($_SESSION[$key]);
    }

    public static function getLastToken() {
        return Session::get('token')[count(Session::get('token')) - 1];
    }
}