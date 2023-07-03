<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This class represents a discount.
 * Discounts can be applied to products or categories.
 * Discounts are represented as a percentage.
 *
 */
class Discount extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'category_id',
        'percentage'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}
