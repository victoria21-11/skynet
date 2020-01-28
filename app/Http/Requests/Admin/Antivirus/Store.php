<?php

namespace App\Http\Requests\Admin\Antivirus;

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
            'title' => ['required', 'string'],
            'description' => [],
            'extra' => [],
            'antivirus_type_id' => ['required', 'integer', 'exists:antivirus_types'],
            'published' => ['required', 'boolean'],
            'tags' => ['nullable', 'array'],
        ];
    }
}
