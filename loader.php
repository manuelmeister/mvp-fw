<?php

namespace Meister;

spl_autoload_register(function ($class) {
    $class_path = str_replace('Meister/','',str_replace('\\', '/', $class));
    include __DIR__.'/'.$class_path.'.php';
});