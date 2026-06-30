<?php

namespace App\Http\Requests;

use App\Rules\CountryCode;
use App\Rules\CurrencyCode;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => [
                'required',
                'string',
                'max:20',
            ],
            'created_at' => [
                'required',
                'date_format:d/m/Y  H:i:s',
            ],
            'phone_number' => [
                'required',
                'string',
                'max:20',
            ],
            'country_iso_code' => [
                'required',
                'string',
                new CountryCode,
            ],
            'email' => [
                'required',
                'email',
            ],
            'name' => [
                'required',
                'string',
            ],
            'zip' => [
                'required',
                'string',
                'max:20',
            ],
            'currency_code' => [
                'required',
                new CurrencyCode,
            ],
            // 'items' => [
            //     'required',
            //     'array',
            // ],
        ];
    }
}
