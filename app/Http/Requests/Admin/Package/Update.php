<?php

namespace App\Http\Requests\Admin\Package;

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
            'title' => [],
            'name' => [],
            'description' => [],
            'extra' => [],
            'hd_channels_count' => [],
            'channels_count' => [],
            'price' => [],
            'published' => [],
        ];
    }
}
