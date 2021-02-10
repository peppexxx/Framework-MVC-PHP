<?php

use core\EventEmitter;

EventEmitter::on('postCreated', function() {
    echo "Ciaooo";
});