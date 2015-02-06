<?php

include_once('loader.php');
@$url = $_GET['url'];

$model   = new Model();
$view    = new View();

$presenter = new Presenter($model, $view);

echo $presenter->indexAction($url);