<?php

namespace App\Http\Requests\Admin\Tariff;

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
            'bill_tariff_id' => [],
            'description' => [],
            'period' => [],
            'period_type_id' => [],
            'price' => [],
            'published' => [],
            'rebate' => [],
            'tariff_group_id' => [],
            'title' => [],
        ];
    }
}
