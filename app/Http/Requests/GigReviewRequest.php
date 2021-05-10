<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GigReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        $gig = $this->route('gig');
        return $this->user()->can('review', $gig);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'rating' => 'required|integer|between:1,5',
            'body' => 'required|string'
        ];
    }
}
