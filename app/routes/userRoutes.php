<?php 

use core\Router;

# middlewares
$isAuth = require '../app/middlewares/isAuth.php';




Router::get('/dashboard', function() {
    echo __FUNCTION__;
},[$isAuth]);

Router::get('/posts/{id}', function() {
    echo __FUNCTION__;
},[$isAuth]);