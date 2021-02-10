<?php

use core\EventEmitter;

EventEmitter::on('userRegister', function() {
    echo "Ciaooo";
});