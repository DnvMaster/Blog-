<?php

namespace Blog\Repositories;

use Blog\Menu;

class MenusRepository extends Repository
{
    public function __construct(Menu $menu)
    {
        $this->model = $menu;
    }
}