<?php

namespace View;

class View
{
    public function page($page, array $args = array()){
        $output = $this->render('view/templates/header.html', $args['header']);

        switch ($page){
            case 'index':
                foreach ($args['content'] as $article){
                    $output .= $this->render('view/templates/article.html', $article);
                }
                break;
            case 'page':
                $output .= $this->render('view/templates/page.html', $args['content'][0]);
                break;
            case 'article':
                $output .= $this->render('view/templates/article.html', $args['content'][0]);
                break;
            default:
                $output .= $this->render('view/templates/single.html', $args['content'][0]);
        }
        $output .= $this->render('view/templates/footer.html', $args['footer']);
        return $output;
    }

    public function render($path, array $args = array())
    {
        $output = file_get_contents($path);
        foreach ($args as $key => $value) {
            $output = str_replace('{'.$key.'}', $value, $output);
        }
        return $output;
    }
}