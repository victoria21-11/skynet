<?php

namespace App\Http\Requests\Admin\Tree;

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
            'section_id' => ['required', 'integer', 'exists:sections,id'],
            'tree_id' => ['required', 'integer', 'exists:trees,id'],
            'url' => ['required', 'string', 'unique:trees'],
        ];
    }
}
