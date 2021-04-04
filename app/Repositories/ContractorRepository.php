<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class ContractorRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function duplicateContactors()
    {
        return $this->all()->groupBy('name')->flatMap(function ($items) {
            if($items->count() > 1){
                return $items;
            }
        });
    }
}
