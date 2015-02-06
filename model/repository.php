<?php

class Repository extends PDO {
    protected static $instance;

    protected $cache;

    function __construct($dsn, $dbname, $dbpass){
        parent::__construct($dsn, $dbname, $dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->cache = array();
    }

    static function getInstance($dsn=NULL,$dbname=NULL,$dbpass=NULL){
        if(!self::$instance){
            self::$instance = new Repository($dsn,$dbname,$dbpass);
        }
        return self::$instance;
    }

    function __destruct(){
        $this->cache = NULL;
    }
}