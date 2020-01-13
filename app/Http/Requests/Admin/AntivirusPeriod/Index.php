<?php

namespace App\Http\Requests\Admin\AntivirusPeriod;

use Illuminate\Foundation\Http\FormRequest;

class Index extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'published' => [],
            'price' => [],
            'period' => [],
            'period_type_id' => [],
            'antivirus_id' => [],
        ];
    }
}
