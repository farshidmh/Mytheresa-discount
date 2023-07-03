<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DiscountTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->post(route('categories.store'), ['name' => 'test']);
        $this->post(route('categories.store'), ['name' => 'test2']);

        $this->post(route('products.store'),
            [
                'name' => 'test Product',
                'price' => 10000,
                'category_name' => 'test',
                'sku' => '00005'
            ]
        );

        $this->post(route('products.store'),
            [
                'name' => 'test2 Product',
                'price' => 10000,
                'category_name' => 'test2',
                'sku' => '00006'
            ]
        );

    }

    public function test_create_product()
    {

        $this->post(route('discounts.storeByProduct'), ['product_sku' => '00005', 'percentage' => 10])->assertStatus(201);

        $this->post(route('discounts.storeByCategory'), ['category_name' => 'test2', 'percentage' => 20]);

        $allProd = $this->get(route('products.getAllProducts'))->json();

        $this->assertEquals(10000, $allProd['data']['data'][0]['price']['original']);
        $this->assertEquals(9000, $allProd['data']['data'][0]['price']['final']);


        $this->assertEquals(10000, $allProd['data']['data'][1]['price']['original']);
        $this->assertEquals(8000, $allProd['data']['data'][1]['price']['final']);
    }


}
