<?php


namespace Tests\Unit;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Schema;
use Tests\TestCase;

class TablesHasColumnsTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    public function test_directory_contractors_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('directory_contractors', [
                'id','name',
            ]), 1);
    }

    public function test_directory_products_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('directory_products', [
                'id','name',
            ]), 1);
    }

    public function test_orders_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('orders', [
                'id','id_products','contractor_id','sum',
            ]), 1);
    }

    public function test_payments_database_has_expected_columns()
    {
        $this->assertTrue(
            Schema::hasColumns('payments', [
                'id','paid','order_id',
            ]), 1);
    }
}
