<?php

namespace App\Http\Requests\Admin\Component;

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
            'name' => ['required', 'alpha_dash'],
            'title' => ['required', 'string'],
            'description' => ['nullable'],
            'path' => ['required', 'string'],
            'params.*.name' => ['required', 'alpha_dash'],
            'params.*.title' => ['required', 'string'],
        ];
    }
}
