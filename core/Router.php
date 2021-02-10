<?php 

namespace core;

class Router {
    protected static $routes = [
        // 0 => [
        // path: '/'
        // action: fn
        // middleware: [..]
    ];
    public static function get($path, $action, $middl = []) {
        self::$routes = [
            ...self::$routes,
            ['path' => $path,'action' => $action,'middleware' => $middl]
        ];
    }
    public function getRoutes() {
        return [...self::$routes];
    }
}