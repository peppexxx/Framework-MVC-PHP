<?php

namespace core;

use core\EventEmitter;

class App extends Router {
    protected $request;
    protected $response;
    protected $middleware;
    protected $host;

    public function __construct($name) {
        # initialize class
        $this->request = new Request();
        $this->response = new Response();
        $this->middleware = new Middleware();

        $this->name = $name;
        $this->host = $_SERVER['HTTP_HOST'];
        $this->port = $_SERVER['SERVER_PORT'];
    }


    public function use($action, $require = null) {
        
        $cloneRoutes = array_slice(parent::$routes, $this->numRouter,count(parent::$routes));

        parent::$routes = $this->numRouter === 0 ? [] : array_slice(parent::$routes, 0, $this->numRouter);

        if(!is_callable($action)){ 
                                        // 0      // ['path','action','middleware']
            foreach ($cloneRoutes as $key => $value) {
                $cloneRoutes[$key]['path'] = $action . $cloneRoutes[$key]['path'];

                # conteggio route
                $this->numRouter++;

                # matching Route basic + Regex
                $result = $this->match($cloneRoutes[$key]);
                
                if($result) {
                    # dispatch controllers or execute callback
                    $this->dispatch($cloneRoutes, $result);
                }
            }

            # salva le nuove rutte destrutturando clone e quelle attuali
            parent::$routes = [
                ...parent::$routes,
                ...$cloneRoutes
            ];

        }

        # add middlewars in routes
        else $this->middleware->set($action);

    }


    public function match($route) {
        return $this->request->uri === $route['path'] ? 1 : $this->matchReg($route);
    }

    public function matchReg($route) {
        $pattern_regex = preg_replace("/\{(.*?)\}/", "(?P<$1>[\w-]+)", $route['path']); 
        $pattern_regex = "#^(?J)" . trim($pattern_regex, "/") . "$#u"; 
        $matches = []; 
        if(preg_match($pattern_regex, $this->request->uri, $matches)) {
            unset($matches[0]);
            return ['matches' => $matches];
        } else return 0;
    }

    public function dispatch($route, $match) {
        echo 'ROTTA TROVATA!';
    }

    public function getEvents() {
        return EventEmitter::get();
    }

    public function getMiddlewares() {
        return $this->middleware->get();
    }
}