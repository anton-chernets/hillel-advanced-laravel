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
     * Display a listing of the resource.
     *
     * @return OrdersCollection
     */
    public function getPaid(): OrdersCollection
    {
        return new OrdersCollection($this->orderRepository->allPaid());
    }

    /**
     * Display a listing of the resource.
     *
     * @param $contractor_id
     * @return OrdersCollection
     */
    public function getByContractorId($contractor_id): OrdersCollection
    {
        return new OrdersCollection($this->orderRepository->allByContractor($contractor_id));
    }

    /**
     * Display a total sum
     *
     * @return \Illuminate\Http\JsonResponse
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
