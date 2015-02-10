<?php

namespace Presenter;

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

        $exploded_url = explode("/",$this->url);
        switch (sizeof($exploded_url)) {
            case 3:
                $this->page = $exploded_url[0];
                $this->param = $exploded_url[1];
                $this->action = $exploded_url[2];
                break;
            case 2:
                $this->page = $exploded_url[0];
                $this->param = $exploded_url[1];
                break;
            case 1:
                $this->page = $exploded_url[0];
                break;
            default:
                $this->page = 'index';
                break;
        }
    }

    public function getPage(){
        return (empty($this->page)) ? 'index' : $this->page;
    }

    public function getAction(){
        return (empty($this->action)) ? 'show' : $this->action;
    }

    public function getParam(){
        return (empty($this->param)) ? '0' : $this->param;
    }
}