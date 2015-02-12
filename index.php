<?php

namespace Meister;

use Meister\Model\Model;
use Meister\View\View;
use Meister\Presenter\Presenter;

require 'model/config.php';
include_once('loader.php');
if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = 'index';
}

$model   = new Model();
$view    = new View();

$presenter = new Presenter($model, $view);

echo $presenter->indexAction($url);