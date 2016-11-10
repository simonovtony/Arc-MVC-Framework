<?php

use \Project\Lib\Route;


Route::get('/', 'BlogController', 'index');

Route::get('/blog', 'BlogController', 'show');

Route::post('/blog/create', 'BlogController', 'create');

Route::post('/comment/create', 'CommentController', 'create');

Route::run();

?>