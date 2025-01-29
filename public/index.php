<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Elirow\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HomeController@index");
$router->get('/article/:id_article', "HomeController@viewArticle");
$router->get('/login/', "UserController@showLogin");
$router->get('/register/', "UserController@showRegister");
$router->get('/logout/', "UserController@logout");

$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");

$router->run();