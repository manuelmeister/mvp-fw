<?php
/**
 * Created by PhpStorm.
 * User: bmeism
 * Date: 11.02.2015
 * Time: 13:59
 */

namespace Meister\Model\Types;

class Index extends Types {

    public $numberOfItems = 2;

    public function getQuery(){
        $offset = (((int) $this->param) * $this->numberOfItems) - $this->numberOfItems;
        return "SELECT * FROM ARTICLE ORDER BY ARTICLE.time DESC LIMIT $this->numberOfItems OFFSET ". $offset .";";
    }

}