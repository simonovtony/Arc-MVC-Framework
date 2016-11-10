<?php

namespace Project\App\Controller;

use Project\Lib\Controller;
use Project\Lib\DB;
use Project\Lib\Redirect;

class CommentController extends Controller {
    public function create() {

        $id = isset($_POST['id']) ? (int)$_POST['id'] : null;
        if($id === null || !is_int($id))
            abort(406, 'Нет статьи');

        $name = isset($_POST['name']) ? $_POST['name'] : null;
        if($name === null || mb_strlen($name) < 1)
            abort(406, 'Не введено имя коментария');

        $text = isset($_POST['text']) ? $_POST['text'] : null;
        if($text === null || mb_strlen($text) < 1)
            abort(406, 'Не введен текст коментария');

        DB::insert("
            INSERT INTO `comments` (`id`, `blog_id`, `name`, `text`, `created_at`, `updated_at`)
            VALUES (NULL, $id, '$name', '$text', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
        ");

        Redirect::back();
    }
}