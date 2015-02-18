<?php

namespace Meister;

spl_autoload_register(function ($class) {
    $class_path = str_replace('Meister/','',str_replace('\\', '/', $class));
    if (file_exists(__DIR__ . '/' . $class_path . '.php')) {
        include_once __DIR__ . '/' . $class_path . '.php';
    }else{
        throw new \Exception("File not found");
    }
});