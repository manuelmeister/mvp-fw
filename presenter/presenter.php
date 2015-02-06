<?php

class Presenter
{
    private $model;

    private $view;

    private $request;

    public function __construct(Model $model, View $view)
    {
        $this->model = $model;
        $this->view = $view;
    }

    public function indexAction($url)
    {
        $this->request = new Request($url);

        $data = $this->model->getData($this->request->getPage(),$this->request->getParam(),$this->request->getAction());
        $page = $this->request->getPage();

        return $this->view->page($page, $data);
    }
}