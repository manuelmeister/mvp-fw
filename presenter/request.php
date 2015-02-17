<?php

namespace Meister\Presenter;

/**
 * Class Request
 * @package Meister\Presenter
 */
class Request {

    /**
     * @var array
     */
    private $url;
    /**
     * @var string
     */
    private $page;
    /**
     * @var string
     */
    private $action;
    /**
     * @var string
     */
    private $param;

    /**
     * @param $url
     */
    function __construct($url){
        $this->url = $url;
        $this->process();
    }

    /**
     * this will trim and explode the url
     */
    function process(){
        $this->url = explode("/",rtrim(ltrim($this->url, "/"), "/"));
    }

    /**
     * @return string get page type
     */
    public function getPage(){
        return (isset($this->url[0]) && !empty($this->url[0])) ? $this->url[0] : 'index';
    }

    /**
     * @return string get slug or id of the content
     */
    public function getParam(){
        return isset($this->url[1]) ? $this->url[1] : '1';
    }

    /**
     * @return string get action
     */
    public function getAction(){
        return isset($this->url[2]) ? $this->url[2] : 'show';
    }
}