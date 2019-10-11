<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddComicRequest extends FormRequest
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
            'title' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'genre' => 'required|string',
            'description' => 'string',
            'rent_price' => 'required|integer'
        ];
    }
}
