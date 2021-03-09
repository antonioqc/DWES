<?php

namespace App\Controllers;
use App\Models\Blog;

class IndexController extends BaseController{

    public function indexAction(){
        $blogs = Blog::all();
        //include '..\views\index.php';
        return $this->renderHTML('index.twig',["blogs" => $blogs]);
    }

    public function aboutAction(){
        return $this->renderHTML('about.twig');
    }

    public function contactAction(){
        return $this->renderHTML('contact.twig');
    }




}