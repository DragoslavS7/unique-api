<?php

abstract class Singleton {
    protected static $_instance;

    public final static function getInstance() {
        if(null === static::$_instance) {
            static::$_instance = new static();
        }

        return static::$_instance;
    }
}