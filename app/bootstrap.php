<?php
    // Load Config
    require_once 'config/config.php';

    // Autoload Core Libraries
    // Class name must match the file name for auto loader to work
    spl_autoload_register(function($className){
        require_once 'libraries/' . $className . '.php';
    });