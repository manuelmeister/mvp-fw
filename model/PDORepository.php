<?php

namespace Meister\Model;

use \PDO;

/**
 * Class PDORepository
 * @package Meister\Model
 */
class PDORepository extends PDO {

    /**
     * @param string $dsn
     * @param string $dbname
     * @param string $dbpass
     */
    function __construct($dsn, $dbname, $dbpass){
        parent::__construct($dsn, $dbname, $dbpass);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->cache = array();
    }

    /**
     * @param string $query
     * @return array
     */
    public function get($query){
        $s = parent::prepare($query);
        $s->execute();
        $result = $s->fetchAll();
        return $result;
    }

    /**
     * @param string $module_category
     * @return array
     */
    public function getOptions($module_category){
        return $this->get("SELECT * FROM OPTIONS WHERE category='$module_category'");
    }

}