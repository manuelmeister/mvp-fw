<?php

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