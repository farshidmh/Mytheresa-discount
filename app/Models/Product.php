<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This class represents a product.
 * A product only has one category.
 * A product can have multiple discounts.
 *
 * @version 1.0.0
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'sku',
        'name',
        'category',
        'price'
    ];

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

}
