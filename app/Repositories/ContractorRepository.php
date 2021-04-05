<?php

namespace App\Repositories;

use App\Models\Contractor;
use App\Repositories\Interfaces\RepositoryInterface;

class ContractorRepository implements RepositoryInterface
{
    public function all()
    {
        return Contractor::all();
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
