<?php

namespace Category;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;


class CategoryRepositoryTest extends TestCase
{
    use RefreshDatabase;

    protected CategoryRepository $categoryRepository;

    public function setUp(): void
    {
        parent::setUp();

        $this->categoryRepository = new CategoryRepository();
    }


    public function testCanCreateCategory()
    {
        Category::factory()->count(5)->create();

        $categories = $this->categoryRepository->all();
        $this->assertEquals(5, $categories->count());
    }

    public function testCategoryInCache()
    {
        Category::factory()->count(5)->create();

        $this->categoryRepository->all();
        $this->assertNotEmpty(Cache::get('categories'));
    }


    public function testFindMethodReturnsCorrectCategory()
    {
        $category = Category::factory()->create();

        $foundCategory = $this->categoryRepository->find($category->id);
        $this->assertEquals($category->id, $foundCategory->id);
        $this->assertEquals($category->name, $foundCategory->name);
    }

    public function testCreateMethodCreatesNewCategory()
    {
        $categoryData = [
            'name' => 'New Category',
        ];

        $category = $this->categoryRepository->create($categoryData);
        $this->assertEquals($categoryData['name'], $category->name);
    }

    public function testFindByNameMethodReturnsCorrectCategory()
    {
        $catName = 'Specific Category';
        Category::factory()->create(['name' => $catName]);

        $foundCategory = $this->categoryRepository->findByName($catName);
        $this->assertEquals('Specific Category', $foundCategory->name);
    }

}
