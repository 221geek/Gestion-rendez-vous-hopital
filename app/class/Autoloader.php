<?php

class Autoloader
{
    public static function registerIndex(){
        spl_autoload_register(array(__CLASS__, "autoload"));
    }
    public static function registerConfig(){
        spl_autoload_register(array(__CLASS__, "autoload2"));
    }
    public static function autoload($class_name){
        require '../app/class/' . $class_name . '.class.php';
    }
    public static function autoload2($class_name){
        require '../class/' . $class_name . '.class.php';
    }
}