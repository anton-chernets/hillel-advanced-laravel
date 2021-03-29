<?php


namespace App\Repositories;


use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function allByContractor($contractor_id)
    {
        return $this->model->where('contractor_id', $contractor_id)->get();
    }

    public function allPaid()
    {
        return $this->model->whereHas('payment', function (Builder $query)  {
            $query->where('paid', true);
        })->get();
    }

    public function totalSumContractorsOrders()
    {
        return $this->all()->sum('sum');
    }
}
