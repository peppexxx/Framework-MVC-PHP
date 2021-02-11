<?php 

namespace core;

class Request {
    protected $body = [
        // 'name' => 'Giuseppe',
        // 'email' => 'email...'
    ];
    public $uri;
    protected $method;
    protected $agent;
    protected $path;
    protected $headers;
    protected $ip;

    public function __construct()
    {
        $this->body = $_REQUEST;
        $this->uri = trim($_SERVER['REQUEST_URI'],'/');  
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->agent = $_SERVER['HTTP_USER_AGENT'];
        $this->ip = $this->setIP();

        # get alls headers from request
        $this->headers = apache_request_headers();
    }

    public function only($search = []) {     
        return $this->filter('only', $search);
    }

    public function except($search = []) {    
        return $this->filter('except', $search);
    }

    public function input($key) {
        if(array_key_exists($key,$this->body)) return $this->body[$key];
    }


    private function filter($type, $search) {
        $body = [];
        foreach ($this->body as $key => $value) {
            $type === 'only' && in_array($key, $search) && $body[$key] = $value;   
            $type === 'except' && !in_array($key, $search) && $body[$key] = $value;
        }
        return $body;
    }
    
    private function setIP() {
        return getenv('HTTP_CLIENT_IP')?: 
            getenv('HTTP_X_FORWARDED_FOR')?:
            getenv('HTTP_X_FORWARDED')?: 
            getenv('HTTP_FORWARDED_FOR')?: 
            getenv('HTTP_FORWARDED')?:
            getenv('REMOTE_ADDR');
    }
}