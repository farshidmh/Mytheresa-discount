<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Cache;

class CategoryRepository implements CategoryRepositoryInterface
{

    public function all(): Collection
    {
        return Cache::remember('categories', 60, function () {
            return Category::all();
        });
    }

    public function find($id): Category
    {
        return Category::findOrFail($id);
    }

    public function create(array $data): Category
    {
        return Category::create($data);
    }

    public function findByName(string $name): ?Category
    {
        return Category::where('name', $name)->firstOrFail();
    }
}
