<?php

namespace Meister\Presenter;

class Request {

    private $url;
    private $page;
    private $action;
    private $param;

    function __construct($url){
        $this->url = $url;
        $this->process();
    }

    function process(){
        $this->url = rtrim($this->url, "/");

        $this->url = explode("/",$this->url);
    }

    public function getPage(){
        return isset($this->url[0]) ? $this->url[0] : 'index';
    }

    public function getParam(){
        return isset($this->url[1]) ? $this->url[1] : '1';
    }

    public function getAction(){
        return isset($this->url[2]) ? $this->url[2] : 'show';
    }
}