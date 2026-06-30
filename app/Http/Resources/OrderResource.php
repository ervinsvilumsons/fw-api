<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\JsonApi\JsonApiResource;

class OrderResource extends JsonApiResource
{
    /**
     * The resource's attributes.
     */
    public $attributes = [
        'created_at',
        'phone_number',
        'country_iso_code',
        'email',
        'name',
        'first_line',
        'second_line',
        'city',
        'state',
        'zip',
        'message',
        'currency_code',
    ];

    /**
     * The resource's relationships.
     */
    public $relationships = [
        'items' => ProductResource::class,
    ];
}
