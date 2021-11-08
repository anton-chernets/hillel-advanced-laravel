<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Console\Command;

class TotalSumOrdersByContractors extends Command
{
    protected $model;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:get-total-sum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Selection based on the sum of all orders for contractors';

    /**
     * Create a new command instance.
     *
     * @param Order $order
     */
    public function __construct(Order $order)
    {
        parent::__construct();

        $this->model = new OrderRepository($order);
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle(): void
    {
        $result = $this->model->totalSumContractorsOrders();

        $this->info("{$result}");
    }
}
