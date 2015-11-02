<?php

class Config {
    
    public static function getData($section, $name = null){
    $config = parse_ini_file("config.ini", true);
    if($name == null){
        return $config[$section];
    }
    return $config[$section][$name];
    }
    
}