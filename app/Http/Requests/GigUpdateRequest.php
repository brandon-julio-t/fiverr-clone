<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GigUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $gig = $this->route('gig');
        $user = $this->user();
        return $gig->user->id == $user->id;
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
            'basic_price' => 'required|integer',
            'standard_price' => 'required|integer',
            'premium_price' => 'required|integer',
            'basic_price_description' => 'required|string',
            'standard_price_description' => 'required|string',
            'premium_price_description' => 'required|string',
            'images' => 'array|min:1',
            'images.*' => 'file|image',
        ];
    }
}
