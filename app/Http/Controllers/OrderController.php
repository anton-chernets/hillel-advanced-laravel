<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrdersCollection;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    protected $orderRepository;

    /**
     * @param OrderRepository $orderRepository
     */
    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    /**
     * @OA\Get(
     *     path="/api/orders/get-paid",
     *     summary="Get paid orders",
     *     description="Display a listing of the resource.",
     *     tags={"Orders"},
     *     @OA\Response(
     *        response="200",
     *        description="Successful response",
     *        @OA\JsonContent(
     *          type="object",
     *          example={
     *             "data": {
     *                  {
     *                      "id": 9,
     *                      "id_products": "[3]",
     *                      "contractor_id": 4,
     *                      "sum": 9957,
     *                      "created_at": "2021-04-04T17:07:30.000000Z",
     *                      "updated_at": "2021-04-04T17:07:30.000000Z"
     *                  },
     *                  {
     *                      "id": 20,
     *                      "id_products": "[2]",
     *                      "contractor_id": 6,
     *                      "sum": 7382,
     *                      "created_at": "2021-04-04T17:07:30.000000Z",
     *                      "updated_at": "2021-04-04T17:07:30.000000Z"
     *                  }
     *              }
     *          },
     *      )
     *   ),
     * )
     */
    public function getPaid(): OrdersCollection
    {
        return new OrdersCollection($this->orderRepository->allPaid());
    }

    /**
     * @OA\Get(
     *     path="/api/orders/get-by-contractor-id/1",
     *     summary="Get paid orders",
     *     description="Display a listing of the resource.",
     *     tags={"Orders"},
     *     @OA\Response(
     *        response="200",
     *        description="Successful response",
     *        @OA\JsonContent(
     *          type="object",
     *          example={
     *             "data":  {
     *                  {
     *                      "id": 4,
     *                      "id_products": "[1]",
     *                      "contractor_id": 1,
     *                      "sum": 6108,
     *                      "created_at": "2021-04-04T17:07:30.000000Z",
     *                      "updated_at": "2021-04-04T17:07:30.000000Z"
     *                  },
     *                  {
     *                      "id": 8,
     *                      "id_products": "[1, 3]",
     *                      "contractor_id": 1,
     *                      "sum": 6180,
     *                      "created_at": "2021-04-04T17:07:30.000000Z",
     *                      "updated_at": "2021-04-04T17:07:30.000000Z"
     *                  }
     *              }
     *          },
     *      )
     *   ),
     * )
     */
    public function getByContractorId($contractor_id): OrdersCollection
    {
        return new OrdersCollection($this->orderRepository->allByContractor($contractor_id));
    }


    /**
     * @OA\Get(
     *     path="/api/orders/get-total-sum-by-contractors",
     *     summary="Get total sum by contractors",
     *     description="Display a listing of the resource.",
     *     tags={"Orders"},
     *     @OA\Response(
     *        response="200",
     *        description="Successful response",
     *        @OA\JsonContent(
     *          type="object",
     *          example={
     *             "data":  {
     *                  "total_sum": 517032
     *              }
     *          },
     *      )
     *   ),
     * )
     */
    public function getTotalSumByContractors(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' =>
            [
                'total_sum' => $this->orderRepository->totalSumContractorsOrders()
            ]
        ]);
    }
}
