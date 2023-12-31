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

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

}
