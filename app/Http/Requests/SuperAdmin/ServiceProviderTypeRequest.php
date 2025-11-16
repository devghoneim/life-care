<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceProviderTypeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }


    private function onCreate()
    {
        return [
            
            'name_ar' => 'required|max:50|min:2',
            'name_en' => 'required|max:50|min:2'
        ];
    }

    private function onUpdate()
{
    return [
             'name_ar' => 'required|max:50|min:2',
            'name_en' => 'required|max:50|min:2'
    ];
}

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
       return $this->isMethod('PUT') || $this->isMethod("PATCH") ? $this->onUpdate() : $this->onCreate();
    }
}
