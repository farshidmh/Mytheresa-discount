<?php

namespace Category;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Actions\Category\ListCategoriesAction;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Support\Collection;
use Mockery;

class ListCategoriesActionTest extends TestCase
{
    use RefreshDatabase;

    protected CategoryRepositoryInterface|Mockery\LegacyMockInterface|Mockery\MockInterface $categoryRepository;
    protected ListCategoriesAction $listCategoriesAction;

    public function setUp(): void
    {
        parent::setUp();

        $this->categoryRepository = Mockery::mock(CategoryRepositoryInterface::class);
        $this->listCategoriesAction = new ListCategoriesAction($this->categoryRepository);
    }

    public function testExecuteReturnsAllCategories()
    {
        $categories = Category::factory()->count(3)->make();

        $this->categoryRepository->shouldReceive('all')->andReturn($categories);

        $returnedCategories = $this->listCategoriesAction->execute();

        $this->assertInstanceOf(Collection::class, $returnedCategories);
        $this->assertCount(3, $returnedCategories);
    }

    public function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }
}
