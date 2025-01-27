<?php
//require __DIR__ . '/../autoload.php';

require __DIR__ . '/../Core/Router.php';
require __DIR__ . '/Controllers/HomeController.php';
require __DIR__ . '/Controllers/ProductController.php';
require __DIR__ . '/Views/layout/header.php';
require __DIR__ . '/Views/layout/head.php';
require __DIR__ . '/Views/layout/footer.php';

$router = new Router();

$router->add('/', 'HomeController@index');
$router->add('/login', 'HomeController@login');

$router->add('/products', 'ProductController@index');
$router->add('/products/view', 'ProductController@view');


$router->run();
?>
