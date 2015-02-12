<?php
/**
 * Created by PhpStorm.
 * User: bmeism
 * Date: 11.02.2015
 * Time: 13:59
 */

namespace Meister\Model\Types;

class Index extends Types {
    public function getQuery(){
        return 'SELECT * FROM ARTICLE';
    }

}