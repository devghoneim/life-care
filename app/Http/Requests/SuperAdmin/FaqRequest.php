<?php


namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'question_ar' => 'required|string|max:500',
            'question_en' => 'required|string|max:500',
            'answer_ar' => 'required|string',
            'answer_en' => 'required|string',
        ];
    }
}