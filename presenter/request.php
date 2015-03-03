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
    private $request_uri_query;

    /**
     * @var array
     */
    private $request_uri;
    /**
     * @var string
     */
    private $page;
    /**
     * @var string
     */
    private $actions;
    /**
     * @var string
     */
    private $param;

    /**
     * @param $url
     */
    function __construct($url){
        $this->request_uri_query = $url;
        $this->process();
    }

    /**
     * this will trim and explode the url
     */
    function process(){
        $this->request_uri_query = explode("?",$this->request_uri_query);
        $this->request_uri = explode("/",rtrim(ltrim($this->request_uri_query[0], "/"), "/"));
    }

    /**
     * @return string get page type
     */
    public function getPage(){
        return (isset($this->request_uri[0]) && !empty($this->request_uri[0])) ? $this->request_uri[0] : 'index';
    }

    /**
     * @return string get slug or id of the content
     */
    public function getParam(){
        return isset($this->request_uri[1]) ? $this->request_uri[1] : '1';
    }

    /**
     * @return string get action
     */
    public function getActions(){
        if (isset($this->request_uri_query[1])) {
            parse_str($this->request_uri_query[1], $this->actions);
        } else {
            $this->actions['action'] = 'show';
        }
        return $this->actions;
    }
}