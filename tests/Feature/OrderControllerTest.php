<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OrderControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    private $endpoint= '/api/v1/orders';

    public function test_lists_all_orders()
    {
        $response = $this->get($this->endpoint)->assertOk();
        $response->assertStatus(200)
                ->assertJsonCount(20,'data')
                ->assertJsonStructure(["data" => [
                                    ['id', 'user_name', 'order_date','total','items_count']
                            ]]);
    }
    public function test_filters_results_by_name()
    {
        $response = $this->get($this->endpoint.'?item_name=Widget');
        $response->assertStatus(200)
                ->assertJsonCount(4,'data');
    }

    public function test_filters_results_by_order_date_range()
    {
        $response = $this->get($this->endpoint.'?date_from=2022-11-01&date_to=2022-11-10');
               $response->assertStatus(200)
                ->assertJsonCount(1,'data');
    }
    public function test_filters_results_by_order_total_price_range()
    {
        $response = $this->get($this->endpoint.'?price_from=100&price_to=500');
               $response->assertStatus(200)
                ->assertJsonCount(2,'data');
    }
    public function test_combines_all_filters_together()
    {
        $response = $this->get($this->endpoint.'?item_name=Widget&date_from=2022-11-01&date_to=2022-11-10&price_from=10&price_to=100');
               $response->assertStatus(200)
                ->assertJsonCount(1,'data')
                ->assertJsonStructure([
                                        "data" => [
                                                    0 => ['id', 'name', 'email','addresses','orders_count']
                                                ]
                                    ]);
    }
}

