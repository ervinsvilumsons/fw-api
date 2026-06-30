<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    const UPDATED_AT = null;

    protected $keyType = 'string';

    public $incrementing = false;

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

    protected $casts = [
        'created_at' => 'datetime',
    ];
}
