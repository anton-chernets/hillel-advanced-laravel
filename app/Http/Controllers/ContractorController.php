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
     *          type="object",
     *          example={
     *             "data": {
     *                  {
     *                      "id": 1,
     *                      "name": "Hayley Reilly",
     *                      "created_at": "2021-04-04T17:07:30.000000Z",
     *                      "updated_at": "2021-04-04T17:07:30.000000Z"
     *                  },
     *                  {
     *                      "id": 2,
     *                      "name": "Hayley Reilly",
     *                      "created_at": "2021-04-04T17:07:30.000000Z",
     *                      "updated_at": "2021-04-04T17:07:30.000000Z"
     *                  }
     *              }
     *          },
     *      )
     *   ),
     * )
     */
    public function getDuplicated(): ContractorsCollection
    {
        return new ContractorsCollection($this->contractorRepository->duplicateContactors());
    }
}
