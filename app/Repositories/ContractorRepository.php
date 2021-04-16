<?php

namespace App\Repositories;

use App\Models\Contractor;
use App\Repositories\Interfaces\RepositoryInterface;

/**
 * Class ContractorRepository
 * @package App\Repositories
 */
class ContractorRepository implements RepositoryInterface
{
    public function all()
    {
        return Contractor::all();
    }

    /**
     * @return Contractor[]|\Illuminate\Database\Eloquent\Collection
     */
    public function duplicateContactors()
    {
        return $this->all()->groupBy('name')->flatMap(function ($items) {
            if($items->count() > 1){
                return $items;
            }
        });
    }
}
