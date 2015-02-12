<?php
/**
 * Created by PhpStorm.
 * User: bmeism
 * Date: 11.02.2015
 * Time: 14:37
 */

namespace Meister\Model\Types;

class Types {

    protected $param;

    protected $action;

    function __construct($param, $action)
    {
        $this->param = $param;
        $this->action = $action;
    }

}