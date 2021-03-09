<?php

namespace App\Controllers;
use Laminas\Diactoros\Response\HtmlResponse as HTMLResponse;

class BaseController {
    protected $templateEngine;

    public function __construct()
    {
       $loader = new \Twig\Loader\FilesystemLoader('../views');
       $this->templateEngine = new \Twig\Environment($loader,array(
           'debug'=>true,
           'cache'=>false,
       ));     
    }

    public function renderHTML($filename,$data=[]){
        return new HTMLResponse($this->templateEngine->render($filename,$data));
    }
}

?>