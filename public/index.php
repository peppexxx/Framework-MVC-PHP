<?php 

use core\App;


# Autoloader class
require '../vendor/autoload.php';

# Events
require '../app/events/postEvents.php';
require '../app/events/userEvents.php';

# Middlewares
$isAuth = require '../app/middlewares/isAuth.php';

# Instance App
$app = new App('My App');

# Config Routes, Middleware ... 

$app->use($isAuth);

$app->use('users/', require '../app/routes/userRoutes.php');
$app->use('api/', require '../app/routes/api.php');


# Get alls Events
var_dump($app->getEvents());

# Get alls Events
var_dump($app->getMiddlewares());