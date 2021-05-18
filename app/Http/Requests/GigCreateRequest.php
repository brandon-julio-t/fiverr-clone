<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GigCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string',
            'gig_category_id' => 'required|exists:gig_categories,id',
            'user_id' => 'required|exists:users,id',
            'about' => 'required|string',
            'basic_price' => 'required|integer|lt:standard_price|lt:premium_price',
            'standard_price' => 'required|integer|gt:basic_price|lt:premium_price',
            'premium_price' => 'required|integer|gt:basic_price|gt:standard_price',
            'basic_price_description' => 'required|string',
            'standard_price_description' => 'required|string',
            'premium_price_description' => 'required|string',
            'images' => 'required|array|min:1',
            'images.*' => 'required|file|image',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'basic_price.lt' => 'Basic price must be less than standard and premium',
            'standard_price.lt' => 'Standard price must be greater than basic and less than premium',
            'standard_price.gt' => 'Standard price must be greater than basic and less than premium',
            'premium_price.gt' => 'Premium price must be greater than basic and standard price ',
        ];
    }
}
