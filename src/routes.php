<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
//LOGIN, ESQUECEU A SENHA, NOVA SENHA
$router->get('/login', 'LoginController@loginView');
$router->post('/login', 'LoginController@login');
$router->get('/reset-password', 'LoginController@passwordResetView');
$router->post('/password-reset', 'LoginController@passwordReset');
$router->post('/new-password', 'LoginController@updatePassword');
$router->post('/sigin', 'LoginController@register');



