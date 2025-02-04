<?php

namespace App\Http\Requests\Admin\AntivirusPeriod;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check() && auth()->user()->hasRole('admin');
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
            'published' => [],
            'price' => [],
            'period' => [],
            'period_type_id' => [],
            'antivirus_id' => [],
        ];
    }
}
