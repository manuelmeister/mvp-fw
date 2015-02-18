<?php

namespace Meister\View;

class View
{
    public function page($page, array $args = array()){

        $output = $this->viewMetaModule('header',$args);

        foreach ($args['content'] as $article){
            $output .= $this->viewModule((($page == 'index') ? 'article' : $page) , $article);
        }

        $output .= $this->viewMetaModule('footer',$args);
        return $output;
    }

    private function viewModule($module, $item){
        return $this->render("view/templates/$module.html", $item);
    }

    private function viewMetaModule($module, $args){
        return $this->render("view/templates/meta/$module.html", $args[$module]);
    }

    private function render($path, array $args = array())
    {
        if (file_exists($path)){
            $output = file_get_contents($path);
        }else{
            header("HTTP/1.0 404 Not Found");
            $output = file_get_contents("view/templates/404.html");
        }
        foreach ($args as $key => $value) {
            $output = str_replace('{'.$key.'}', $value, $output);
        }
        return $output;
    }
}