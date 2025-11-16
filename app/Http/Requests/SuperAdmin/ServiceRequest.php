<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function onCreate()
    {
        return [
            'name_ar' => 'required|min:2|max:50',
            'name_en' => 'required|min:2|max:50',
            'provider_type' => 'nullable|exists:service_provider_types,id',
            'image' => 'required|file|mimes:png,jpg,BMP',
        ];
    }

    
        protected function onUpdate()
    {
        return [
            'name_ar' => 'required|min:2|max:50',
            'name_en' => 'required|min:2|max:50',
            'provider_type' => 'sometimes|nullable|exists:service_provider_types,id',
            'image' => 'nullable|file|mimes:png,jpg,BMP',
        ];
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return $this->isMethod('PUT') ||  $this->isMethod('PATCH') ? $this->onUpdate() : $this->onCreate();
    }
}
