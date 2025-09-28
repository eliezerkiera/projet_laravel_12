<?php

namespace App\Http\Requests\Market;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateMarketProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'working_state' => 'nullable|numeric|min:0|max:100',
            'user_id' => 'required|exists:users,id',
            'country_id' => 'required|exists:countries,id',
            'market_product_type_id' => 'required|exists:market_product_types,id',
            'market_product_category_id' => 'required|exists:market_product_categories,id',
            'market_product_payment_method_id' => 'required|exists:market_product_payment_methods,id',
            'currency_id' => 'required|exists:currencies,id',
        ];
    }
}
