<?php

namespace Meister\Presenter;

use Meister\Model\Model;
use Meister\View\View;

class Presenter
{
    private $model;

    private $view;

    private $request;

    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
    }

    public function indexAction($url)
    {
        $this->request = new Request($url);

        $data = $this->model->getData($this->request->getPage(),$this->request->getParam(),$this->request->getActions());
        $page = $this->request->getPage();

        return $this->view->page($page, $data);
    }
}