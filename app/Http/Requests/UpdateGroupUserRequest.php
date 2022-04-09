<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupUserRequest extends FormRequest
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
            'users' => ['required', 'array'],
            'users.*' => ['integer'],
            'selected_users' => ['sometimes', 'array'],
            'selected_users.*' => ['integer'],
            'users_page' => ['sometimes', 'integer'],
            'quizzes_page' => ['sometimes', 'integer'],
        ];
    }
}
