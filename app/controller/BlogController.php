<?php

namespace Project\App\Controller;

use Project\Lib\Controller;
use Project\Lib\DB;
use Project\Lib\Redirect;
use Project\Lib\Translit;
use Project\Lib\Url;
use Project\Lib\View;

class BlogController extends Controller {
    public function index() {
        // TOP
        $sql = "
            SELECT b.*, COUNT(c.`id`) AS `comment_count`
            FROM `blogs` AS b
            INNER JOIN `comments` AS c
              ON b.`id` = c.`blog_id`
            GROUP BY b.`id`
            HAVING MAX(c.`blog_id`)
            ORDER BY `comment_count` DESC
            LIMIT 5
        ";
        $top = DB::select($sql);
        if(count($top) > 0) {
            foreach($top as & $blog) {
                $blog['title'] = htmlentities($blog['title']);
                $blog['content'] = $blog['content'];
                if(mb_strlen($blog['content']) > 100) {
                    $blog['content'] = mb_substr($blog['content'], 0, 100) . '...';
                }
            }
        }

        // PAGINATOR

        $sql = "
            SELECT COUNT(*) AS `count`
            FROM `blogs`
        ";
        $blog_count = DB::select($sql);
        $paginator = [];
        $paginator['total'] = (int)$blog_count[0]['count'];
        $paginator['count'] = 10;
        $paginator['page'] = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $paginator['offset'] = ($paginator['page'] - 1) * $paginator['count'];

        // BLOG
        $sql = "
            SELECT b.*, COUNT(c.`id`) AS `comment_count`
            FROM `blogs` AS b
            LEFT JOIN `comments` AS c
              ON b.`id` = c.`blog_id`
            GROUP BY b.`id`
            ORDER BY `updated_at` DESC
            LIMIT {$paginator['offset']},{$paginator['count']}
        ";
        $blogs = DB::select($sql);

        if(count($blogs) > 0) {
            foreach($blogs as & $blog) {
                $blog['title'] = htmlentities($blog['title']);
                $blog['content'] = $blog['content'];
                if(mb_strlen($blog['content']) > 100) {
                    $blog['content'] = mb_substr($blog['content'], 0, 100) . '...';
                }
            }
        }

        View::run('blog.index', [
            'blogs' => $blogs,
            'top'   => $top,
            'paginator' => $paginator,
        ]);
    }

    public function show() {
        if(count($_GET) == 0 && count($_GET) > 1)
            Redirect::to('/');

        $url = array_keys($_GET)[0];

        $blog = DB::select("
            SELECT *
            FROM `blogs`
            WHERE `url` = '$url';
        ");

        if(count($blog) == 0)
            Redirect::to('/');

        $blog = $blog[0];

        $comments = DB::select("
            SELECT *
            FROM `comments`
            WHERE `blog_id` = {$blog['id']}
            ORDER BY `updated_at` DESC
        ");

        View::run('blog.show', [
            'blog'     => $blog,
            'comments' => $comments,
        ]);
    }

    public function create() {
        // VALIDATOR
        $title = isset($_POST['title']) ? $_POST['title'] : null;
        if($title === null || mb_strlen($title) < 1)
            abort(406, 'Не введен заголовок статьи');

        $content = isset($_POST['content']) ? $_POST['content'] : null;
        if($content === null || mb_strlen($content) < 1)
            abort(406, 'Не введен контент статьи');

        $author = isset($_POST['author']) ? $_POST['author'] : null;
        if($author === null || mb_strlen($author) < 1)
            abort(406, 'Не введен автор статьи');

        $url = Translit::convert($title);

        DB::insert("
            INSERT INTO `blogs` (`id`, `title`, `url`, `content`, `author`, `created_at`, `updated_at`)
            VALUES (NULL, '$title', '$url', '$content', '$author', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
        ");

        Redirect::to('/');
    }
}

?>