<?php

namespace App\Http\Requests;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\Intl\Countries;
use Symfony\Component\Intl\Currencies;

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
                'unique:orders,id',
                'string',
                'max:20',
            ],
            'created_at' => [
                'required',
                'date',
            ],
            'phone_number' => [
                'required',
                'string',
                'max:20',
            ],
            'country_iso_code' => [
                'required',
                'string',
                Rule::in(Countries::getCountryCodes()),
            ],
            'email' => [
                'required',
                'email',
            ],
            'name' => [
                'required',
                'string',
            ],
            'first_line' => [
                'nullable',
                'string',
            ],
            'second_line' => [
                'nullable',
                'string',
            ],
            'city' => [
                'nullable',
                'string',
            ],
            'state' => [
                'nullable',
                'string',
            ],
            'zip' => [
                'required',
                'string',
                'max:20',
            ],
            'message' => [
                'nullable',
                'string',
            ],
            'currency_code' => [
                'required',
                Rule::in(Currencies::getCurrencyCodes()),
            ],
            // 'items' => [
            //     'required',
            //     'array',
            // ],
        ];
    }

    /**
     * Handle a passed validation attempt.
     */
    protected function passedValidation(): void
    {
        $this->merge([
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i:s'),
        ]);
    }
}
