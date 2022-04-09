<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGroupQuizRequest extends FormRequest
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
            'quizzes' => ['required', 'array'],
            'quizzes.*' => ['integer'],
            'selected_quizzes' => ['sometimes', 'array'],
            'selected_quizzes.*' => ['integer'],
            'users_page' => ['sometimes', 'integer'],
            'quizzes_page' => ['sometimes', 'integer'],
        ];
    }
}
