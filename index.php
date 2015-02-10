<?php

require 'model/config.php';
include_once('loader.php');
if(isset($_GET['url'])){
    $url = $_GET['url'];
}else{
    $url = 'index';
}

$model   = new Model\Model();
$view    = new View\View();

$presenter = new \Presenter\Presenter($model, $view);

echo $presenter->indexAction($url);