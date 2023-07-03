<?php

namespace Category;

use Tests\TestCase;
use App\Actions\Category\CreateCategoryAction;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Validation\ValidationException;
use Mockery;

class CreateCategoryActionTest extends TestCase
{
    use RefreshDatabase;

    protected CategoryRepositoryInterface|Mockery\LegacyMockInterface|Mockery\MockInterface $categoryRepository;
    protected CreateCategoryAction $createCategoryAction;

    public function setUp(): void
    {
        parent::setUp();

        $this->categoryRepository = Mockery::mock(CategoryRepositoryInterface::class);
        $this->createCategoryAction = new CreateCategoryAction($this->categoryRepository);
    }

    public function testExecuteMethodCreatesNewCategory()
    {
        $categoryName = 'New Category';

        $this->categoryRepository->shouldReceive('create')->andReturnUsing(function ($data) use ($categoryName) {
            $this->assertEquals($categoryName, $data['name']);
            return new Category($data);
        });

        $category = $this->createCategoryAction->execute($categoryName);

        $this->assertEquals($categoryName, $category->name);
    }

    public function testExecuteMethodThrowsValidationException()
    {
        $this->expectException(ValidationException::class);

        $categoryName = '';  // Empty name should fail validation rules
        $this->createCategoryAction->execute($categoryName);
    }

    public function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }
}
