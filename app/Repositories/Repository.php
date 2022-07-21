<?php

namespace App\Repositories;
use Config;

abstract class Repository {
    protected $model = false;

    public function get($select = '*', $take = FALSE){
        $builder = $this->model->select('*');
        if($take){
            $builder->take($take);
        }
        return $builder->get();
    }
}