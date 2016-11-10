<?php

namespace Project\Lib;

class Redirect {
    public static function to($uri) {
        header('Location: ' . Url::to($uri));
    }

    public static function back() {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}