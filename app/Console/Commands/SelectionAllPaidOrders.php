<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Repositories\OrderRepository;
use Illuminate\Console\Command;

class SelectionAllPaidOrders extends Command
{
    protected $model;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'orders:get-all-paid';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Selection all paid orders';

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
        $result = $this->model->allPaid();

        foreach ($result as $item) {
            $this->info("{$item}");
            $this->line("\n");
        }
    }
}
