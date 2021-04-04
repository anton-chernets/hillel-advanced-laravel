<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrdersResource;
use App\Models\Order;
use App\Repositories\OrderRepository;

class OrderController extends Controller
{
    protected $model;

    /**
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        $this->model = new OrderRepository($order);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getPaid(): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return OrdersResource::collection($this->model->allPaid());
    }

    /**
     * Display a listing of the resource.
     *
     * @param $contractor_id
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function getByContractorId($contractor_id): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        return OrdersResource::collection($this->model->allByContractor($contractor_id));
    }

    /**
     * Display a total sum
     *
     * @return int
     */
    public function getTotalSumByContractors(): int
    {
        return $this->model->totalSumContractorsOrders();
    }
}
