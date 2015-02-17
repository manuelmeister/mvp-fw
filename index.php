<?php

namespace Meister;

use Meister\Model\Model;
use Meister\View\View;
use Meister\Presenter\Presenter;

require 'model/config.php';
include_once('loader.php');
if(isset($_SERVER['REQUEST_URI'])){
    $url = $_SERVER['REQUEST_URI'];
}else{
    $url = 'index';
}

$model   = new Model();
$view    = new View();

$presenter = new Presenter($model, $view);

echo $presenter->indexAction($url);