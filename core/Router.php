<?php 

namespace core;

class Router {
    protected static $routes = [
        // 0 => [
        //      path: '/'
        //      action: fn
        //      middleware: [..]
        // ]
    ];

    # num routes
    protected $numRouter = 0;

    public static function get($url, $action, $middl = []) {
        self::$routes = [
            ...self::$routes,
            [
                'path' => trim($url,'/'),
                'action' => $action,
                'middleware' => $middl,
            ]
        ];
    }
}