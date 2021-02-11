<?php 
namespace core;

class Middleware {
    protected $middleware = [
        // [']
    ];
    public function set($closure) {
        return $this->middleware[] = $closure; 
    }
    public function get() {
        return $this->middleware;
    }
}
