<?php

namespace Tests\Feature;

use App\Models\Contractor;
use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;
use Tests\TestCase;

class DataBunchCreateTest extends TestCase
{
    public function test_data_bunch_create()
    {
        Contractor::factory()->count(10)->create();

        Product::factory()->count(3)->create();

        Order::factory()->count(30)->create();

        Payment::factory()->count(30)->create();
    }
}
