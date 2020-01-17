<?php

namespace App\Http\Requests\Admin\Navigation;

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
            'sort_column' => ['nullable', 'string'],
            'sort_direction' => ['nullable', 'string'],
            'title' => [],
            'published' => [],
        ];
    }
}
