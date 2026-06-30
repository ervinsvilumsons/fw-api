<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    const UPDATED_AT = null;

    protected $keyType = 'string';

    public $incrementing = false;

    /**
     * The attributes that should be fillable.
     */
    protected $fillable = [
        'id',
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
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'created_at' => 'datetime',
    ];

    /**
     * The header map for mapping CSV columns to model attributes.
     */
    public static array $headerMap = [
        'ID' => 'id',
        'Created (ext)' => 'created_at',
        'Phone' => 'phone_number',
        'Country code' => 'country_iso_code',
        'Buyer email' => 'email',
        'Name' => 'name',
        'Message' => 'message',
        'Currency code' => 'currency_code',
        'Full Address' => 'address',
        'Products' => 'items',
    ];

    /**
     * Get the products associated with the order.
     */
    public function items(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
