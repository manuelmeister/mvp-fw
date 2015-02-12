<?php

namespace Meister\Model;
use Meister\Model\Types\Types;

/**
 * Class Model
 * @package Model
 */
class Model
{
    /**
     * @var Repository
     */
    private $db;

    /**
     *
     */
    function __construct()
    {
        $this->db = new Repository('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    }

    /**
     * @param string $page
     * @param string $param
     * @param string $action
     * @return array
     */
    public function getData($page = 'index', $param = '1', $action = 'show')
    {
        $output['header'] = $this->getMetaModule('header');
        $classname = 'Meister\Model\Types\\'.ucfirst($page);
        if (class_exists($classname, $autoload = true)) {
            $contentModule = new $classname($param,$action);
            $output['content'] = $this->db->get($contentModule->getQuery());
        } else {
            $output['content'] = array(array(
                    'title'     => '404',
                    'content'   => '<p>Page not found</p>',
                    'slug'      => '404',
                ));
        }

        $output['footer'] = $this->getMetaModule('footer');
        return $output;
    }

    /**
     * @param array $args
     * @return array
     */
    private function processOptions(array $args = array()){
        foreach ($args as $option){
            $options[$option['name']] = $option['value'];
        }
        return $options;
    }

    /**
     * @param $module_category
     * @return array
     */
    private function getMetaModule($module_category){
        return $this->processOptions($this->db->get("SELECT * FROM OPTIONS WHERE category='$module_category'"));
    }
}