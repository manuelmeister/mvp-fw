<?php
/**
 * Created by PhpStorm.
 * User: bmeism
 * Date: 11.02.2015
 * Time: 13:59
 */

namespace Meister\Model\Types;

class Page extends Types {

    function getQuery()
    {
        if(is_numeric($this->param)){
            return "SELECT * FROM PAGE WHERE id='".(int) $this->param."'";
        }else {
            return "SELECT * FROM PAGE WHERE slug='$this->param'";
        }
    }

}