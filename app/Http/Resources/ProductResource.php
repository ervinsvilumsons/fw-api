<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class ProductResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    public $attributes = [
        'sku',
        'title',
        'image',
        'quantity',
        'price',
        'variations',
    ];

    /**
     * The resource's relationships.
     */
    public $relationships = [
        //
    ];
}
