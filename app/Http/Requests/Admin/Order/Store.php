<?php

namespace App\Http\Requests\Admin\Order;

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
            'id' => ['integer',],
'title' => [],
'description' => [],
'phone' => [],
'street' => [],
'house' => [],
'tariff_id' => [],
'house_id' => [],
'created_at' => ['date',],
'updated_at' => ['date',],

        ];
    }
}
