<?php


use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub

        $this->post(route('categories.store'), ['name' => 'test']);
    }

    public function test_create_product()
    {
        $product = $this->post(route('products.store'),
            [
                'name' => 'test Product',
                'price' => 10000,
                'category_name' => 'test',
                'sku' => '00005'
            ]
        );
        $product->assertStatus(201);
    }

    public function test_get_product_price()
    {
        $this->post(route('products.store'),
            [
                'name' => 'test Product',
                'price' => 10000,
                'category_name' => 'test',
                'sku' => '00005'
            ]
        );

        $product = $this->get(route('products.priceLessThan', ['price' => 10000]));

        $prod = json_decode($product->getContent());

        $this->assertEquals(10000, $prod->data->data[0]->price->original);
        $this->assertEquals(10000, $prod->data->data[0]->price->final);
    }

    public function test_get_product_by_category_name()
    {
        $this->post(route('products.store'),
            [
                'name' => 'test Product',
                'price' => 10000,
                'category_name' => 'test',
                'sku' => '00005'
            ]
        );

        $product = $this->get(route('products.getProductsByCategoryName', ['categoryName' => 'test']));

        $prod = json_decode($product->getContent());
        $this->assertEquals('test', $prod->data->data[0]->category);
    }

    public function test_get_all_products()
    {
        $this->post(route('products.store'),
            [
                'name' => 'test Product',
                'price' => 10000,
                'category_name' => 'test',
                'sku' => '00005'
            ]
        );

        $product = $this->get(route('products.getAllProducts'));

        $prod = json_decode($product->getContent());
        $this->assertEquals('test', $prod->data->data[0]->category);
    }


}
