<?php 

namespace core;

use InvalidArgumentException;

class EventEmitter {
    private static $events = [
        // '0'  => ['connection' => fn]
    ];


    
    public static function on($nameEvent, $closure) { 
        try {
            if(!is_callable($closure)) { throw new InvalidArgumentException('Il 2° argomento deve essere una callback'); }
            self::$events = [...self::$events, [$nameEvent => $closure,'type' => 'Event']];
        }
        catch(InvalidArgumentException $e) {
            echo 'Errore: '.$e->getMessage().'<br>Linea: '.$e->getLine().'<br>File: '.$e->getFile();
            exit;
        }
    }


    public static function emit(string $nameEvent, $data = null) {
        foreach (self::$events as $event) {
            if(array_key_exists($nameEvent, $event)) {
                # chiama le callback
                $data == null && \call_user_func($event[$nameEvent]);
                is_array($data) &&  \call_user_func_array($event[$nameEvent],[$data]);
                (is_string($data) || is_int($data)) && \call_user_func($event[$nameEvent],$data);
            }
        }
    }

    public static function getAllEvents() {
        return self::$events;
    }
}


