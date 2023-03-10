<?php

namespace Blog\Repositories;

abstract class Repository
{
    protected $model = false;
    public function get()
    {
        $builder = $this->model->select('*');
        return $builder->get();
    }
}