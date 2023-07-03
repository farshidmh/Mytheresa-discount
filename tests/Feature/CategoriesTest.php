<?php

namespace Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use function PHPUnit\Framework\assertEquals;

class CategoriesTest extends TestCase
{
    use RefreshDatabase;

    public function test_access_empty_categories()
    {
        $response = $this->get(route('categories.index'));
        $response->assertStatus(200);
    }

    public function test_create_categories()
    {
        $response = $this->post(route('categories.store'), ['name' => 'test']);
        $response->assertStatus(201);
    }

    public function test_create_dup_categories()
    {
        $response = $this->post(route('categories.store'), ['name' => 'test']);
        $response->assertStatus(201);

        $response = $this->post(route('categories.store'), ['name' => 'test']);
        $response->assertStatus(422);
    }

    public function test_access_categories()
    {
        $response = $this->post(route('categories.store'), ['name' => 'test']);
        $response->assertStatus(201);

        $response = $this->get(route('categories.index'));
        $data = json_decode($response->getContent());
        assertEquals($data->data->categories[0]->name, 'test');
    }

}
