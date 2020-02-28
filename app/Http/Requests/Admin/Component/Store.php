<?php

namespace App\Http\Requests\Admin\Component;

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
'name' => [],
'title' => [],
'description' => [],
'path' => [],
'created_at' => ['date',],
'updated_at' => ['date',],

        ];
    }
}
