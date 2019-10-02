<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProfileUpdateRequest extends FormRequest
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
            'idktp' => ['digits:16',
                Rule::unique('users')->ignore(\Auth::user())
            ],
            'email' => ['string',
                Rule::unique('users')->ignore(\Auth::user())
            ],
             'birth_date' => 'date',
             'picture' => 'image',
        ];
    }
}
