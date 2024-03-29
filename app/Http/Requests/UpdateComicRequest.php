<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateComicRequest extends FormRequest
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
            'cover' => 'image',
            'title' => 'string',
            'author' => 'string',
            'publisher' => 'string',
            'genre' => 'string',
            'description' => 'string',
            'rent_price' => 'integer'
        ];
    }
}
