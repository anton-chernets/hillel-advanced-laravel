<?php


namespace App\Repositories;


use App\Models\Order;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Builder;

class OrderRepository implements RepositoryInterface
{
    public function all()
    {
        return Order::all();
    }

    public function allByContractor($contractor_id)
    {
        return Order::where('contractor_id', $contractor_id)->get();
    }

    public function allPaid()
    {
        return Order::whereHas('payment', function (Builder $query)  {
            $query->where('paid', true);
        })->get();
    }

    public function totalSumContractorsOrders()
    {
        return $this->all()->sum('sum');
    }
}
