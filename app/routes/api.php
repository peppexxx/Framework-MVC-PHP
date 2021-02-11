<?php 

use core\Router;

Router::get('/users/{id}', function() {
    echo __FUNCTION__;
});