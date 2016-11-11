<?php

namespace Project\App\Controller;

use Project\Lib\Controller;
use Project\Lib\DB;
use Project\Lib\Redirect;
use Project\Lib\Session;

class CommentController extends Controller {
    public function create() {
        if(!in_array($_POST['token'], Session::get('token'))) {
            abort(500, 'Ошибка сервера!');
        }

        $id = isset($_POST['id']) ? (int)$_POST['id'] : -1;
        if($id === -1 || !is_int($id)) {
            abort(406, 'Нет статьи');
        }

        $name = isset($_POST['name']) ? htmlentities(strip_tags($_POST['name']), ENT_QUOTES, 'UTF-8') : "";
        if(mb_strlen($name) < 1) {
            abort(406, 'Не введено имя коментария');
        }

        $text = isset($_POST['text']) ? htmlentities(strip_tags($_POST['text']), ENT_QUOTES, 'UTF-8') : "";
        if(mb_strlen($text) < 1) {
            abort(406, 'Не введен текст коментария');
        }

        DB::insert("
            INSERT INTO `comments` (`id`, `blog_id`, `name`, `text`, `created_at`, `updated_at`)
            VALUES (NULL, $id, '$name', '$text', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
        ");

        Redirect::back();
    }
}