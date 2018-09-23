<?php

namespace LaraDex\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePokemonRequest extends FormRequest
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
            'name' => 'required|max: 15',
            'clasification' => 'required|max: 15',
            'weight' => 'required|max: 4',
            'height' => 'required|max: 4',
            'ranking' => 'required|max: 4',
            'type' => 'required|max: 15',
            'image' => 'required|image',

        ];
    }
}
