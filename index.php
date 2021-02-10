<?php 

use core\App;


# Autoloader class
require './vendor/autoload.php';

# Events
require './app/events/postEvents.php';
require './app/events/userEvents.php';

# Middlewares
$isAuth = require './app/middlewares/isAuth.php';

# Instance App
$app = new App('My App');

# Config Routes, Middleware ... 
$app->use('users/', require './app/routes/userRoutes.php');
$app->use('posts/', require './app/routes/postRoutes.php');
$app->use($isAuth);


# Get alls Routes
var_dump($app->getRoutes());

# Get alls Events
var_dump($app->getEvents());

