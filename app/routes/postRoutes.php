<?php 

use core\Router;

Router::get('/:id', function() {
    echo "ciao";
});