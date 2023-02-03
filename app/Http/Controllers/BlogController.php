<?php

namespace Blog\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    protected $menus_repository;
    protected $portfolios_repository;
    protected $sliders_repository;
    protected $articles_repository;
    protected $template;
    protected $vars = array();
    protected $contentRightBar = false;
    protected $contentLeftBar = false;
    protected $bar = false;

    public function __construct()
    {
        //
    }
    protected function renderOutput()
    {
        return view($this->template)->with($this->vars);
    }
}
