<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * The attributes that should be fillable.
     */
    protected $fillable = [
        'id',
        'sku',
        'title',
        'image',
        'quantity',
        'price',
        'variations',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'variations' => 'array',
    ];

    /**
     * The header map for mapping CSV columns to model attributes.
     */
    public static array $headerMap = [
        'ID (Internal)' => 'product_id',
        'SKU' => 'sku',
        'Products' => 'title',
        'Sheet(s)' => 'quantity',
        'Grand total' => 'price',
        'Material' => 'variation_names',
        'Size' => 'variation_values',
    ];

    /**
     * Get the variations attribute as a JSON string when saving to the database.
     */
    protected function meta(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => json_encode($value),
        );
    }
}
