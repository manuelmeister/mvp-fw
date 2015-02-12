<?php

namespace Meister\Model;

use \PDO;

class Repository extends PDO {

    function __construct($dsn, $dbname, $dbpass){
        parent::__construct($dsn, $dbname, $dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->cache = array();
    }
}