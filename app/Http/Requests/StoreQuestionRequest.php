<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'choice_1' => ['required', 'string', 'max:255'],
            'choice_2' => ['required', 'string', 'max:255'],
            'choice_3' => ['nullable', 'string', 'max:255'],
            'choice_4' => ['nullable', 'string', 'max:255'],
            'answer' => ['required', 'string', 'max:1'],
            'type'  => ['required', Rule::in(['yes-or-no', 'multiple-choice'])],
        ];
    }
}
