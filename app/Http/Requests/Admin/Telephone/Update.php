<?php

namespace App\Http\Requests\Admin\Telephone;

use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->hasRole('admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => [],
            'description' => [],
            'price' => [],
            'price_urban' => [],
            'price_mobile' => [],
            'price_landline' => [],
            'min_per_month' => [],
            'published' => [],
        ];
    }
}
