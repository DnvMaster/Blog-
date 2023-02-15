<?php

namespace Blog\Http\Controllers;

use Menu;
use Blog\Repositories\MenusRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use function foo\func;

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

    public function __construct(MenusRepository $menus_repository)
    {
        $this->menus_repository = $menus_repository;
    }
    protected function renderOutput()
    {
        $menu = $this->getMenu();
        //dd($menu);
        $navigation = view(env('BLOG').'.navigation')->with('menu', $menu)->render();
        $this->vars = Arr::add($this->vars,'navigation',$navigation);

        return view($this->template)->with($this->vars);
    }

    protected function getMenu()
    {
        $menu = $this->menus_repository->get();
        $mBuilder = Menu::make('MyNav', function($m) use($menu)
        {
            foreach ($menu as $item)
            {
                if ($item->parent == 0)
                {
                    $m->add($item->title,$item->path)->id($item->id);
                }
                else
                {
                    if ($m->find($item->parent))
                    {
                        $m->find($item->parent)->add($item->title,$item->path)->id($item->id);
                    }
                }
            }
        });
        return $mBuilder;
    }
}
