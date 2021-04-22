<?php


namespace App\Repositories;


use App\Models\Order;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class OrderRepository implements RepositoryInterface
{
    /**
     * @return Order[]|\Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Order::all();
    }

    /**
     * @param $order_id
     * @return Order
     */
    public function findById($order_id): Order
    {
        return Order::find($order_id);
    }

    /**
     * @param $contractor_id
     * @return mixed
     */
    public function allByContractor($contractor_id)
    {
        return Order::where('contractor_id', $contractor_id)->get();
    }

    /**
     * @return mixed
     */
    public function allPaid()
    {
        return Order::whereHas('payment', function (Builder $query)  {
            $query->where('paid', true);
        })->get();
    }

    /**
     * @return mixed
     */
    public function totalSumContractorsOrders()
    {
        return $this->all()->sum('sum');
    }
}
