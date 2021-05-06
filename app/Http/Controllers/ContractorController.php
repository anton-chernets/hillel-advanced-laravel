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
     * @OA\Get(
     *     path="/api/contractors/get-duplicated",
     *     summary="Get duplicated contractors",
     *     description="Display a listing of the resource.",
     *     tags={"Contractors"},
     *     @OA\Response(
     *        response="200",
     *        description="Successful response",
     *        @OA\JsonContent(
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  format="query",
     *                  @OA\Property(property="id", type="integer", example=1),
     *                  @OA\Property(property="name", type="string", example="Hayley Reilly"),
     *                  @OA\Property(property="created_at", type="string", example="2021-04-04T17:07:30.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2021-04-04T17:07:30.000000Z"),
     *              ),
     *          ),
     *      )
     *   ),
     * )
     */
    public function getDuplicated(): ContractorsCollection
    {
        return new ContractorsCollection($this->contractorRepository->duplicateContactors());
    }
}
