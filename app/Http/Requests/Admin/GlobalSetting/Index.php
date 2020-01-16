<?php

namespace App\Http\Requests\Admin\GlobalSetting;

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
            'title' => ['nullable', 'string'],
            'name' => ['nullable', 'string'],
            'value' => ['nullable', 'string'],
            'published' => ['nullable', 'boolean'],
        ];
    }
}
