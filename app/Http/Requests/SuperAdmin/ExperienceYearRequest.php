<?php

namespace App\Http\Requests\SuperAdmin;

use Illuminate\Foundation\Http\FormRequest;

class ExperienceYearRequest extends FormRequest
{
  public function authorize(): bool
    {
        return true;
    }

    private function onCreate() : array
    {
        return 
        [
            'name_ar' => 'required|min:2|max:50',
            'name_en' => 'required|min:2|max:50'
        ];
    }

    private function OnUpdate() : array
    {
         return 
        [
            'name_ar' => 'required|min:2|max:50',
            'name_en' => 'required|min:2|max:50'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() : array
    {
       
       return $this->isMethod('PUT') || $this->isMethod('PATCH') ? $this->onUpdate()  : $this->onCreate() ;
    }

  
}