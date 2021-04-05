<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContractorsCollection;
use App\Repositories\ContractorRepository;

class ContractorController extends Controller
{
    protected $contractorRepository;

    /**
     * @param ContractorRepository $contractorRepository
     */
    public function __construct(ContractorRepository $contractorRepository)
    {
        $this->contractorRepository = $contractorRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function getDuplicated(): ContractorsCollection
    {
        return new ContractorsCollection($this->contractorRepository->duplicateContactors());
    }
}
