<?php

spl_autoload_register(function ($class) {
    $class_path = str_replace('\\', '/', $class);
    include __DIR__.'/'.$class_path.'.php';
});