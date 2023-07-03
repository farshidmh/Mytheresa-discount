<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * This class represents a category.
 * Categories can be applied to products.
 * Categories can have multiple discounts.
 *
 *
 * @version 1.0.0
 */
class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

}
