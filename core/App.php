<?php

namespace core;

use core\EventEmitter;

class App extends Router {
    protected $request;
    protected $response;
    protected $host;

    public function __construct($name) {
        # initialize class
        $this->request = new Request();
        $this->response = new Response();
        $this->name = $name;
        $this->host = $_SERVER['HTTP_HOST'];
        $this->port = $_SERVER['SERVER_PORT'];

        # test Request  (OK)
        
    }


    public function use($action, $require = null) {
        is_callable($action) ? $this->action($action,'middleware') : $this->action($action);
    }


    private function action($action, $type = null) {
        parent::$routes = array_map(function($ele) use($action,$type) {
            return [
                'path' => ($type === null) ? $action.$ele['path'] : $ele['path'],
                'action' => $ele['action'],
                'middleware' => ($type === 'middleware') ? [...$ele['middleware'], $action] : [...$ele['middleware']]
            ];
        }, parent::$routes);
    }

    public function getEvents() {
        return [...EventEmitter::getAllEvents()];
    }

    public function matching() {
        echo __CLASS__;
    }
}