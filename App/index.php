<?php
session_start();

//require __DIR__ . '/../autoload.php';

require __DIR__ . '/Config/config.php';
require __DIR__ . '/../Core/Router.php';
require __DIR__ . '/../Core/Database.php';
require __DIR__ . '/../Core/EmptyModel.php';
require __DIR__ . '/Controllers/HomeController.php';
require __DIR__ . '/Controllers/ProductController.php';
require __DIR__ . '/Controllers/UserController.php';
require __DIR__ . '/Controllers/CartController.php';

$router = new Router();

$router->add('/', 'HomeController@index');
$router->add('/login', 'HomeController@login');

$router->add('/products', 'ProductController@index');
//$router->add('/products/view', 'ProductController@view');
$router->add('/product/delete', 'ProductController@delete');
$router->add('/product/edit', 'ProductController@update');

$router->add('/user/login', 'UserController@login');
$router->add('/user/signup', 'UserController@signup');
$router->add('/user/logout', 'UserController@logout');
$router->add('/user/profile/view', 'UserController@profileView');

$router->add('/cart/view', 'CartController@view');
$router->add('/cart/addToCart', 'CartController@addToCart');
$router->add('/cart/getCart', 'CartController@getCart');
$router->add('/cart/deleteCartProduct', 'CartController@deleteCartProduct');
$router->add('/cart/increaseProductQuantity', 'CartController@increaseProductQuantity');
$router->add('/cart/decreaseProductQuantity', 'CartController@decreaseProductQuantity');

$router->run();
?>
