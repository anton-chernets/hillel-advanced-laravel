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
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  format="query",
     *                  @OA\Property(property="id", type="integer", example=9),
     *                  @OA\Property(property="id_products", type="string", example="[3]"),
     *                  @OA\Property(property="contractor_id", type="integer", example=4),
     *                  @OA\Property(property="sum", type="integer", example=9957),
     *                  @OA\Property(property="created_at", type="string", example="2021-04-04T17:07:30.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2021-04-04T17:07:30.000000Z"),
     *              ),
     *          ),
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
     *          @OA\Property(
     *              property="data",
     *              type="array",
     *              @OA\Items(
     *                  type="object",
     *                  format="query",
     *                  @OA\Property(property="id", type="integer", example=4),
     *                  @OA\Property(property="id_products", type="string", example="[1]"),
     *                  @OA\Property(property="contractor_id", type="integer", example=1),
     *                  @OA\Property(property="sum", type="integer", example=6108),
     *                  @OA\Property(property="created_at", type="string", example="2021-04-04T17:07:30.000000Z"),
     *                  @OA\Property(property="updated_at", type="string", example="2021-04-04T17:07:30.000000Z"),
     *              ),
     *          ),
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
     *          @OA\Property(
     *              property="data",
     *              type="object",
     *              @OA\Property(property="total_sum", type="integer", example=517032),
     *          ),
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
