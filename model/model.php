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
     * @var PDORepository
     */
    private $db;

    /**
     *
     */
    function __construct()
    {
        $this->db = new PDORepository('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    }

    /**
     * @param string $page
     * @param string $param
     * @param string $action
     * @return array
     */
    public function getData($page, $param, $action)
    {
        $output['header'] = $this->getMetaModule('header');
        $classname = 'Meister\Model\Types\\'.ucfirst($page);

        try {
            if (class_exists($classname, $autoload = true)) {
                $contentModule = new $classname($param,$action);
                $tmp = $this->db->get($contentModule->getQuery());
                if (!empty($tmp)) {
                    $output['content'] = ($tmp);
                } else {
                    $output['content'] = (array(array(
                        'title' => '404',
                        'content' => "<p>" . ucfirst($page) . " \"$param\" not found</p>",
                        'slug' => '404',
                    )));
                    header("HTTP/1.0 404 Not Found");
                }

            }
        } catch(\Exception $e) {
            $output['content'] = array(array(
                'title'     => '404',
                'content'   => "<p>".ucfirst($page)." not found</p>",
                'slug'      => '404',
            ));
            header("HTTP/1.0 404 Not Found");
        }

        $output['footer'] = $this->getMetaModule('footer');
        return $output;
    }

    /**
     * @param array $args
     * @return array
     */
    private function processOptions(array $args = array()){
        $options = [];
        foreach ($args as $option){
            $options[$option['name']] = $option['value'];
        }
        return $options;
    }

    /**
     * @param string $module_category
     * @return array
     */
    private function getMetaModule($module_category){
        return $this->processOptions($this->db->getOptions($module_category));
    }
}