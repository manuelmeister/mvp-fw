<?php

namespace Model;

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

    function __construct()
    {
        $this->db = new Repository('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASSWORD);
    }

    public function getData($page = 'index', $param = 1, $action = 'show')
    {
        $output['header'] = $this->getModule('header');
        switch ($page) {
            case 'index':
                $output['content'] = $this->get("SELECT * FROM ARTICLE");
                break;
            case 'article':
                $output['content'] = $this->get("SELECT * FROM ARTICLE WHERE (ID='$param' OR slug='$param')");
                break;
            case 'page':
                $output['content'] = $this->get("SELECT * FROM PAGE WHERE (ID='$param' OR slug='$param')");
                break;
            default:
                $output['content'] = array(array(
                    'title'     => '404',
                    'content'   => '<p>Page not found</p>',
                    'slug'      => '404',
                ));
                break;
        }
        $output['footer'] = $this->getModule('footer');
        return $output;
    }

    public function get($query)
    {
        $s = $this->db->prepare($query);
        $s->execute();
        $result = $s->fetchAll();
        if (empty($result)){
            return array(array(
                'title' => '<h1>404</h1>',
                'content' => '<p>Page not found</p>',
            ));
        }else{
            return $result;
        }
    }

    private function processOptions(array $args = array()){
        foreach ($args as $option){
            $options[$option['name']] = $option['value'];
        }
        return $options;
    }

    private function getModule($module_category){
        return $this->processOptions($this->get("SELECT * FROM OPTIONS WHERE category='$module_category'"));
    }
}