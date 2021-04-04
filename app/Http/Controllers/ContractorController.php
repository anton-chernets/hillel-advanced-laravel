<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractorsResource;
use App\Models\Contractor;
use App\Repositories\ContractorRepository;

class ContractorController extends Controller
{
    protected $model;

    /**
     * @param Contractor $contractor
     */
    public function __construct(Contractor $contractor)
    {
        $this->model = new ContractorRepository($contractor);
    }

    /**
     * Display a listing of the resource.
     */
    public function getDuplicated(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return ContractorsResource::collection($this->model->duplicateContactors())
        ;
    }
}
