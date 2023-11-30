<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    private $endpoint= '/api/v1/users';

    public function test_lists_all_users()
    {
        $response = $this->get($this->endpoint)->assertOk();
        $response->assertStatus(200)
                ->assertJsonCount(6,'data')
                ->assertJsonStructure(["data" => [
                                    ['id', 'name', 'email','addresses','orders_count']
                            ]]);
    }
    public function test_filters_results_by_name()
    {
        $response = $this->get($this->endpoint.'?name=Evelyn');
        $response->assertStatus(200)
                ->assertJsonCount(2,'data');
    }
    public function test_filters_results_by_email()
    {
        $response = $this->get($this->endpoint.'?email=evelynsantiago@endipine.com');
        $response->assertStatus(200)
                ->assertJsonCount(1,'data');
    }
    public function test_filters_results_by_address()
    {
        $response = $this->get($this->endpoint.'?address=Lacon');
        $response->assertStatus(200)
                ->assertJsonCount(50,'data');
    }


    public function test_filters_results_by_name_email()
    {
        $response = $this->get($this->endpoint.'?name=Evelyn&email=evelynsantiago@endipine.com');
        $response->assertStatus(200)
                ->assertJsonCount(1,'data');
    }
    public function test_filters_results_by_name_not_exisit_email()
    {
        $response = $this->get($this->endpoint.'?name=Evelyn&email=th@endipine.com');
        $response->assertStatus(200)
                ->assertJsonCount(0,'data');
    }

    public function test_combines_all_filters_together()
    {
        $response = $this->get($this->endpoint.'?name=Evelyn&email=evelynsantiago@endipine.com&address=Lacon');
               $response->assertStatus(200)
                ->assertJsonCount(1,'data')
                ->assertJsonStructure([
                                        "data" => [
                                                    0 => ['id', 'name', 'email','addresses','orders_count']
                                                ]
                                    ]);
    }
}

