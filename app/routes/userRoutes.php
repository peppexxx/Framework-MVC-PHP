<?php 

use core\Router;

# middlewares
$isAdmin = require './app/middlewares/isAdmin.php';


Router::get('/', function() {
    echo "ciao";
},[$isAdmin]);